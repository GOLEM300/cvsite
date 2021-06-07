<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function show(Cv $cv)
    {
        return view('site.show',compact('cv'));
    }

    public function search()
    {
        return view('site.search');
    }
}
