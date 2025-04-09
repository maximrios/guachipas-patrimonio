<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Search extends Component
{
    public $id = '';
    public $name = '';
    public $key = '';
    public $title = '';
    public $class = '';
    public $url = '';

    public function __construct($id = "", $name = "", $key = "id", $title = "", $class = "", $url = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->key = $key;
        $this->title = $title;
        $this->class = $class;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search');
    }
}
