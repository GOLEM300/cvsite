<?php

namespace App\Http\Controllers\Api\Cv;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use Illuminate\Http\Request;
use App\UseCases\Cvs\CvService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Cv\CreateRequest;
use App\Http\Requests\Cv\EditRequest;
use Symfony\Component\HttpFoundation\Response;

class CvController extends Controller
{
    private $service;

    public function __construct(CvService $service)
    {
        $this->service = $service;
    }

    public function create(CreateRequest $request)
    {
        $this->service->create(1,$request);
        return response()->json([
                'success' => 'Cv was made and stored.'
            ], Response::HTTP_CREATED);
    }

    public function remove(int $cv_id)
    {
        $this->service->remove($cv_id);
        return response()->json([
            'success' => 'Cv was removed.'
        ], Response::HTTP_NO_CONTENT);
    }

    public function update(EditRequest $request)
    {
        $cv_id = key($request->query());
            $this->service->update(
                $request,
                $cv_id
            );
        return response()->json([
            'success' => 'Cv was updated.'
        ], Response::HTTP_ACCEPTED);
    }
}
