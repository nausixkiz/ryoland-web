<?php

namespace App\View\Components;

use Closure;
use Conner\Tagging\Model\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class PopularTagComponent extends Component
{
    public Collection $tags;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tags = Tag::orderBy('count', 'desc')->take(10)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.popular-tag-component');
    }
}
