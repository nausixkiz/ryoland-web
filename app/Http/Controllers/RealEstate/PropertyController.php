<?php

namespace App\Http\Controllers\RealEstate;

use App\Http\Controllers\Controller;
use App\Models\RealEstate\Category;
use App\Models\RealEstate\Property;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PropertyController extends Controller
{
    private string $indexRoute = 'real-estate.properties.index';

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Home', 'icon' => 'fa-solid fa-home'],
            ['name' => 'Properties'],
        ];

        $mapScriptMarkerRender = '';

        foreach (Property::all() as $property) {
            $mapScriptMarkerRender .= "L.marker([" . $property->latitude . ", " . $property->longitude . "]).addTo(map);" . PHP_EOL;

        }

        return view('contents.property.index', [
            'mapScriptMarkerRender' => $mapScriptMarkerRender,
            'properties' => Property::paginate(10),
            'categories' => Category::all(),
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Application|Factory|View
     */
    public function show(string $slug): View|Factory|Application
    {
        $property = Property::findBySlugOrFail($slug);

        views($property)->record();

        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Home', 'icon' => 'fa-solid fa-home'],
            ['url' => route($this->indexRoute), 'name' => __('Properties'), 'icon' => 'fa-solid fa-home'],
            ['name' => $property->name],
        ];

        $categoryNameRenderHtml = '';

        foreach ($property->categories as $key => $category) {
            if ($key == 0) {
                $categoryNameRenderHtml .= '<li><label>Category:</label><span><a href="' . route('real-estate.categories.show', $category->slug) . '">' . $category->name . '</a></span></li>';
            } else {
                $categoryNameRenderHtml .= '<li><label></label><span><a href="' . route('real-estate.categories.show', $category->slug) . '">' . $category->name . '</a></span></li>';
            }

        }

        return view('contents.property.show', [
            'property' => $property,
            'relatedProperty' => Property::where('id', '!=', $property->id)->where('type', $property->type)->whereHas('categories', function ($query) use ($property) {
                $query->whereIn('category_id', $property->categories->pluck('id'));
            })->take(2)->get(),
            'gallery' => $property->getGalleryConversionUrl(),
            'categoryNameRenderHtml' => rtrim($categoryNameRenderHtml, ', '),
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
