<?php

namespace App\View\Components;

use Illuminate\View\Component;


class Alert extends Component {

    public $page;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page, $type = "primary") {
        $this->page = $page;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
