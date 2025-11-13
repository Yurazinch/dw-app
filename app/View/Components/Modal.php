<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{   
    public $halls; 
    /**
     * Создайте новый экземпляр компонента.
     */
    public function __construct($halls)
    {
        $this->halls = $halls;
    }

    /**
     * Получить представление/содержимое, представляющее компонент.
     */
    public function render(): View|Closure
    {
        return view('components.modal');
    }
}
