<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EmptyState extends Component
{
    public $icon;
    public $title;
    public $description;
    public $actionText;
    public $actionUrl;
    public $actionVariant;
    public $class;

    public function __construct(
        $icon = 'fa fa-inbox',
        $title = 'Sin resultados',
        $description = null,
        $actionText = null,
        $actionUrl = null,
        $actionVariant = 'primary',
        $class = ''
    ) {
        $this->icon = $icon;
        $this->title = $title;
        $this->description = $description;
        $this->actionText = $actionText;
        $this->actionUrl = $actionUrl;
        $this->actionVariant = $actionVariant;
        $this->class = $class;
    }

    public function hasAction(): bool
    {
        return !is_null($this->actionText) && !is_null($this->actionUrl);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.empty-state');
    }
}
