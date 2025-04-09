<?php

namespace App\View\Components\Document;

use Illuminate\View\Component;

class Viewer extends Component
{
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.document.viewer');
    }
}
