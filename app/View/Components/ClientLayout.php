<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ClientLayout extends Component
{

    public $title = '';

    /**
     * @param string $title
     */
    public function __construct(string $title = '')
    {
        $this->title = $title;
    }


    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('client.app');
    }
}
