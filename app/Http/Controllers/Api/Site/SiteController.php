<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\CvResource;
use App\Models\Cv;
use App\Models\Filter;
use App\Repositories\PrevWorksInterface;
use App\UseCases\Cvs\CvService;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    private $service;

    public function __construct(CvService $service)
    {
        $this->service = $service;
    }

    public function show($cv_id)
    {
        $user_cv = $this->service->getUserCv($cv_id);
        return new CvResource($user_cv);
    }

    public function search()
    {   
        $cvs = $this->service->getAllCv();
        return CvResource::collection($cvs);
    }
}