<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\CvResource;
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

    public function search(Request $request)
    {   
        $request = json_decode($request['request']);
        $cvs = $this->service->getAllCvWithPaginate($request);
        return CvResource::collection($cvs);
    }
}