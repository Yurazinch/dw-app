<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Film extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $films)
    {
        $this->films = $films;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.film');
    }
}
