<?php

namespace App\Http\Controllers\Cv;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use Illuminate\Http\Request;
use App\UseCases\Cvs\CvService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Cv\CreateRequest;
use App\Repositories\SpecializationsInterface;

class CvController extends Controller
{
    private $service;

    public function __construct(CvService $service)
    {
        $this->service = $service;
    }

    public function create(SpecializationsInterface $specialization)
    {
        return view('cv.create', [
            'specialization_name' => $specialization->list(),
        ]);
    }

    public function store(CreateRequest $request)
    {
        try {
            $cv = $this->service->create(
                Auth::id(),
                $request
            );
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->route('site.site.show', $cv);
    }

    public function remove(Cv $cv)
    {
        try {
            $this->service->remove($cv->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->route('profile.profile.list', Auth::user()->id);
    }

    public function edit()
    {
        //
    }
}
