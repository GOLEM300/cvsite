<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\UseCases\Cvs\CvService;

class SiteController extends Controller
{

    private $service;

    /**
     * 
     */
    public function __construct(CvService $service)
    {
        $this->service = $service;
    }

    /**
     * 
     */
    public function show(Cv $cv)
    {
        $user_cv = $this->service->getUserCv($cv->id);
        return view('site.show', compact('user_cv'));
    }

    /** 
     * 
     */
    public function search()
    {   
        return view('site.search');
    }
}
