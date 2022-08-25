<?php

namespace App\Http\Controllers\Profile\Links\Template;

use App\Http\Controllers\Controller;
use App\Models\Link;
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
    public function __invoke(Request $request, Link $link)
    {
       return view("profile.links.templates.{$link->template}",[
           'profile' => $link->profile()->withoutEagerLoad([
               'user:id,name,email',
               'experiences:id,description,'
           ])
       ]);
    }
}
