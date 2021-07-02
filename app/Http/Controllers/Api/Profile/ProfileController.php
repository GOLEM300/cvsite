<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\CvResource;
use App\UseCases\Cvs\CvService;

class ProfileController extends Controller
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

    public function list(int $user_id)
    {
        $cvs = $this->service->getUserCvs($user_id);
        return CvResource::collection($cvs);
    }
}
