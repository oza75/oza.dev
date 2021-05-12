export default class DisableButtonOnFormSubmit {
    /**
     * @param {HTMLElement|null} element
     */
    constructor(element = null) {
        this.elements = this.forms(element);
        this.handle = this.handle.bind(this);
        this.elements.forEach(element => {
            element.addEventListener('submit', this.handle);
        })
    }

    /**
     * @param {Event} event
     */
    handle(event) {
        if (event.target.checkValidity()) {
            event.submitter.setAttribute('disabled', 'disabled');
        }
    }

    disconnect() {
        this.elements.forEach(element => {
            element.removeEventListener('submit', this.handle);
        })
    }

    /**
     * @param {HTMLElement|null} element
     * @return {HTMLElement[]}
     */
    forms(element = null) {
        if (element) {
            return Array.from([element]);
        }

        return Array.from(document.querySelectorAll('form'))
    }
}
