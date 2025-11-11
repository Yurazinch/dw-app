<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HallCreate extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public array $halls)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hall-create');
    }
}
