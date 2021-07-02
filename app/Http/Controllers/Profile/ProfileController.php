<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\UseCases\Cvs\CvService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $service;

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
        return view('profile.show', compact('user_cv'));
    }

    public function list()
    {
        $cvs = $this->service->getUserCvs(Auth::user()->id);
        return view('profile.list',compact('cvs'));
    }
}
