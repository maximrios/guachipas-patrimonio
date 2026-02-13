<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $variant;
    public $size;
    public $href;
    public $type;
    public $icon;
    public $iconPosition;
    public $disabled;
    public $loading;
    public $class;
    public $target;
    public $rounded;

    public function __construct(
        $variant = 'primary',
        $size = 'lg',
        $href = null,
        $type = 'button',
        $icon = null,
        $iconPosition = 'left',
        $disabled = false,
        $loading = false,
        $class = '',
        $target = null,
        $rounded = false
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->href = $href;
        $this->type = $type;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
        $this->disabled = $disabled;
        $this->loading = $loading;
        $this->class = $class;
        $this->target = $target;
        $this->rounded = $rounded;
    }

    public function variantClasses(): string
    {
        $variants = [
            'primary' => 'btn-primary',
            'secondary' => 'btn-secondary',
            'success' => 'btn-success',
            'danger' => 'btn-danger',
            'warning' => 'btn-warning',
            'info' => 'btn-info',
            'light' => 'btn-light',
            'dark' => 'btn-dark',
            'link' => 'btn-link',
            'outline-primary' => 'btn-outline-primary',
            'outline-secondary' => 'btn-outline-secondary',
            'outline-success' => 'btn-outline-success',
            'outline-danger' => 'btn-outline-danger',
            'outline-warning' => 'btn-outline-warning',
            'outline-info' => 'btn-outline-info',
        ];

        return $variants[$this->variant] ?? 'btn-primary';
    }

    public function sizeClasses(): string
    {
        $sizes = [
            'xs' => 'btn-xs',
            'sm' => 'btn-sm',
            'md' => '',
            'lg' => 'btn-lg',
        ];

        return $sizes[$this->size] ?? '';
    }

    public function isLink(): bool
    {
        return !is_null($this->href);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
