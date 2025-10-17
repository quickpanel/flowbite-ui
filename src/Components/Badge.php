<?php

namespace QuickPanel\FlowBiteUI\Components;

use Livewire\Component;

class Badge extends Component
{
    public $type = 'info';
    public $dismissible = false;
    public $text = '';
    public $icon = true;
    public $border = false;
    public $pill = false;
    public $size = 'md';

    public function mount(
        $type = 'info',
        $dismissible = false,
        $text = '',
        $icon = true,
        $border = false,
        $pill = false,
        $size = 'md'
    ) {
        $this->type = $type;
        $this->dismissible = $dismissible;
        $this->text = $text;
        $this->icon = $icon;
        $this->border = $border;
        $this->pill = $pill;
        $this->size = $size;
    }

    public function render()
    {
        return view('flowbite-ui::components.badge');
    }
}
