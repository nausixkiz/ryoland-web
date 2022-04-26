<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Conner\Tagging\Model\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class BlogController extends Controller
{
    private Collection $widgets;

    public function __construct()
    {
        $this->widgets = collect([
            'latest_blogs' => Blog::orderBy('created_at', 'desc')->take(4)->get(),
            'categories' => Category::all(),
            'tags' => Tag::orderBy('count', 'desc')->take(10)->get(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Home', 'icon' => 'fa-solid fa-home'],
            ['name' => 'News'],
        ];
        return view('contents.blog.index', [
            'blogs' => Blog::paginate(10),
            'breadcrumbs' => $breadcrumbs,
            'widgets' => $this->widgets
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $blog = Blog::findBySlugOrFail($slug);

        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Home', 'icon' => 'fa-solid fa-home'],
            ['url' => route('news.index'), 'name' => 'News', 'icon' => 'fa-solid fa-newspaper'],
            ['name' => $blog->name]
        ];

        $related_blogs = Blog::where('id', '!=', $blog->id)
            ->where('category_id', $blog->category_id)
            ->take(3)
            ->get();

        views($blog)->record();

        return view('contents.blog.show', [
            'blog' => $blog,
            'related_blogs' => $related_blogs,
            'breadcrumbs' => $breadcrumbs,
            'widgets' => $this->widgets
        ]);
    }

    /**
     * Display the categories' resource.
     *
     * @param $slug
     * @return Application|Factory|View
     */
    public function category($slug)
    {
        $category = Category::findBySlugOrFail($slug);

        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Home', 'icon' => 'fa-solid fa-home'],
            ['name' => $category->name],
        ];

        return view('contents.category.show', [
            'blogs' => $category->blogs()->paginate(10),
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', '=', $slug)->firstOrFail();

        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Home', 'icon' => 'fa-solid fa-home'],
            ['name' => 'Tag: ' . $tag->name],
        ];

        return view('contents.blog.tag', [
            'blogs' => Blog::withAnyTag([$tag->name])->paginate(10),
            'breadcrumbs' => $breadcrumbs,
            'widgets' => $this->widgets
        ]);
    }
}
