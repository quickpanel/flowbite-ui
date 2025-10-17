<?php

namespace QuickPanel\FlowBiteUI\Components;

use Livewire\Component;
use Livewire\Attributes\On;

class Button extends Component
{
    public $variant = 'solid';
    public $color = 'blue';
    public $size = 'md';
    public $disabled = false;
    public $type = 'button';
    public $text = '';

    public function mount($variant = 'solid', $color = 'blue', $size = 'md', $disabled = false, $type = 'button', $text = '')
    {
        $this->variant = $variant;
        $this->color = $color;
        $this->size = $size;
        $this->disabled = $disabled;
        $this->type = $type;
        $this->text = $text;
    }

    public function render()
    {
        return view('flowbite-ui::components.button');
    }
}
