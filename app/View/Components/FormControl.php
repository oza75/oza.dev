<?php

namespace App\View\Components;

use Illuminate\View\Component;

abstract class FormControl extends Component
{
    public $name;

    public $label;

    public $id;

    public $classes;

    public $type = 'text';

    public $value;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string|null $label
     * @param string|null $value
     * @param string|null $id
     * @param string|null $type
     * @param string|null $classes
     */
    public function __construct(
        string $name, ?string $label = null,
        ?string $value = null, ?string $id = null,
        ?string $type = null, ?string $classes = null
    )
    {
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->type = $type;
        $this->classes = $classes;
        $this->value = $value;
    }
}
