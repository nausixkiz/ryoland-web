<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Home', 'icon' => 'fa-solid fa-home'],
            ['name' => 'My Account'],
        ];

        return view('profile.show', [
            'breadcrumbs' => $breadcrumbs,
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
