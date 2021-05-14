export default class Recaptcha {
    /**
     * @param {HTMLElement|string} element or selector
     * @param {Object} options
     */
    constructor(element, options = {}) {
        this.element = element;
        this.options = Object.assign({formValidation: true}, options);
        this.events = {
            before: [],
            then: []
        };
    }

    scriptRegistered() {
        const items = this.items();

        items.forEach(item => {
            this.handle(item);
        });
    }

    isFormValidation() {
        return this.options.formValidation;
    }

    register() {
        this.registerScript();
    }

    /**
     * @param {string} str
     * @return {string}
     */
    camelCase(str) {
        return String(str)
            .toLowerCase()
            .replace(/[^a-zA-Z0-9]+(.)/g, (m, chr) => chr.toUpperCase());
    }

    /**
     * @returns {HTMLElement[]}
     */
    items() {
        if (typeof this.element === 'string') {
            return Array.from(document.querySelectorAll(this.element));
        }

        return [this.element];
    }

    /**
     * @param {HTMLElement} item
     * @param {string} name
     * @return {Object} built
     */
    build(item, name) {
        const built = {element: null, mounted: false, custom: false};
        const id = item.getAttribute('id');
        let element = document.querySelector(`#${id}-recaptcha`);
        if (element) {
            if (element.dataset.recaptchaMounted) built.mounted = true;
            else built.custom = true;
        } else {
            element = document.createElement('div');
            element.setAttribute('id', `${id}-recaptcha`);
            item.insertAdjacentElement('afterend', element);
        }

        if (!built.mounted) {
            element.setAttribute('data-callback', name);
            element.classList.add('g-recaptcha');
            element.setAttribute('data-size', 'invisible');
            built.element = element;
        }

        return built;
    }

    /**
     * @param {HTMLElement} item
     */
    handle(item) {
        const id = item.getAttribute('id');
        if (!id) {
            console.error('You should add id to recaptcha button element.', item);
            return;
        }
        let name = this.camelCase(id) + 'RecaptchaHandler';
        const built = this.build(item, name);
        if (built.mounted) return false;
        if (built.custom) name = built.element.dataset.callback;

        const form = this.isFormValidation() ? item.closest('form') : null;
        const submit = function (item, form, options, token) {
            if (form) {
                const input = document.createElement('input');
                input.name = 'recaptcha_token';
                input.value = token;
                input.type = 'hidden';

                if (options.callback) {
                    options.callback(token)
                } else {
                    form.appendChild(input);
                    form.submit();
                }
            } else if (options.callback) {
                options.callback(token)
            }

            try {
                this.runEvents('then', item, token);
            } catch (e) {
                console.error(e);
            }
        }

        window[name + 'WidgetID'] = this.render(built.element);
        window[name] = submit.bind(this, item, form, this.options);

        item.addEventListener('click', (event) => {
            event.preventDefault();
            this.runEvents('before', item);
            if (this.isFormValidation()) {
                if (form.reportValidity()) {
                    item.setAttribute('disabled', true);
                    this.execute(window[name + 'WidgetID']);
                }
            } else {
                this.execute(window[name + 'WidgetID']);
            }
        });

        built.element.setAttribute('data-recaptcha-mounted', true);
    }

    registerScript() {
        window.handleRecaptcha = this.scriptRegistered.bind(this);
        let script = document.querySelector('#recaptcha-script');
        if (!script) {
            script = document.createElement('script');
            script.setAttribute('id', 'recaptcha-script');
            script.src = 'https://www.google.com/recaptcha/api.js?onload=handleRecaptcha&render=explicit';
            document.head.appendChild(script);
        } else {
            if (window.grecaptcha && window.grecaptcha.render) {
                this.scriptRegistered();
            }
        }
    }

    siteKey() {
        return window.recaptcha_site_key;
    }

    /**
     * @param {HTMLElement} element
     * @return {number} Widget ID
     */
    render(element) {
        return window.grecaptcha.render(element, {sitekey: this.siteKey()})
    }

    execute(id) {
        return window.grecaptcha.execute(id)
    }

    /**
     * @param {Function} func
     */
    then(func) {
        this.events['then'].push(func);
    }

    /**
     * @param {Function} func
     */
    before(func) {
        this.events['before'].push(func);
    }

    runEvents(section, ...args) {
        Array.from(this.events[section] || [])
            .forEach(func => func.call(...args));
    }
}
