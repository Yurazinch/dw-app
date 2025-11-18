<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hithall extends Component
{
    public $halls;
    /**
     * Create a new component instance.
     */
    public function __construct($halls)
    {
        $this->halls = $halls;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure
    {
        return view('components.hithall');
    }
}
