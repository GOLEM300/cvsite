<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Repositories\CvQueriesInterface;
use App\Repositories\PrevWorksInterface;
use App\UseCases\Cvs\CvService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $service;

    public function __construct(CvService $service)
    {
        $this->service = $service;
    }

    public function list(PrevWorksInterface $prevWorksExp)
    {
        $cvs = $this->service->getUserCvs(Auth::user()->id);
        return view('profile.list',compact('cvs','prevWorksExp'));
    }
}
