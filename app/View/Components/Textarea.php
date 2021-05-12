<?php

namespace App\View\Components;


use Illuminate\Contracts\View\View;

class Textarea extends FormControl
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.textarea');
    }
}
