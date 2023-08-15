<?php

namespace App\View\Components\Tailwind;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string  $name,
        public string  $label,
        public string  $placeholder = '',
        public ?string $value = null,
        public string  $rows = '3',
        public string  $cols = '30',
        public string  $required = 'false',
        public string  $disabled = 'false',
        public string  $readonly = 'false',
        public string  $autofocus = 'false',
        public string  $autocomplete = 'false',
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tailwind.textarea');
    }
}
