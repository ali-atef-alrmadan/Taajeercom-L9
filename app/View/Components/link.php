<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class link extends Component
{
    public $href;
    public $content;
    public $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href, $content, $url)
    {
        $this->href = $href;
        $this->content = $content;
        $this->url = $url;
    }

    public function is_active(): string
    {
        return Request::is($this->url);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        return view('components.web.link');
    }

}
