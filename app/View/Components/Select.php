<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;

class Select extends FormControl
{
    public $options = [];

    /**
     * @var string
     */
    public $valueKey;

    /**
     * @var string
     */
    public $textKey;

    /**
     * Select constructor.
     * @param string $name
     * @param string|null $label
     * @param string|null $value
     * @param string|null $id
     * @param string|null $type
     * @param string|null $classes
     * @param string|array|null $options
     * @param string|null $valueKey
     * @param string|null $textKey
     */
    public function __construct(
        string $name, ?string $label = null, ?string $value = null,
        ?string $id = null, ?string $type = null,
        ?string $classes = null, $options = [],
        ?string $valueKey = null, ?string $textKey = null
    )
    {
        parent::__construct($name, $label, $value, $id, $type, $classes);
        $this->options = $options;
        $this->valueKey = $valueKey;
        $this->textKey = $textKey;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        $this->options = $this->formattedOptions();

        return view('components.select');
    }

    /**
     * @return array
     */
    private function formattedOptions(): array
    {
        if (empty($this->textKey) || empty($this->valueKey)) {
            return collect($this->options)->toArray();
        }

        return collect($this->options)->pluck($this->textKey, $this->valueKey)->toArray();
    }
}
