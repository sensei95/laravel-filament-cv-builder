<?php

namespace App\Http\Controllers\Profile\Experiences;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        return view('profile.experiences.show',[
            'user' => auth()->user()->load('profile.experiences')
        ]);
    }
}
