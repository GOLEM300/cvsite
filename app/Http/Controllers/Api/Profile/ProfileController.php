<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\CvResource;
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

    public function list(int $user_id)
    {
        $cvs = $this->service->getUserCvs($user_id);
        return CvResource::collection($cvs);
    }
}
