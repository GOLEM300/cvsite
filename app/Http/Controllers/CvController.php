<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use App\UseCases\Cvs\CvService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Cv\CreateRequest;
use Gate;

class CvController extends Controller
{
    private $service;

    public function __construct(CvService $service)
    {
        $this->service = $service;
    }

    public function create()
    {
        $specialization_name = DB::table('specializations')->pluck('specialization','id');
        return view('cv.create', [
            'specialization_name' => $specialization_name,
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

        return redirect()->route('site.show', $cv);
    }

    public function remove(Cv $cv)
    {
        // $this->checkAccess($cv);
        try {
            $this->service->remove($cv->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->route('profile.list',$cv->user_id);
    }

    // private function checkAccess(Cv $cv): void
    // {
    //     if (!Gate::allows('user_id', $cv)) {
    //         abort(403);
    //     }
    // }
}
