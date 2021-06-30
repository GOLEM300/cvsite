<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Repositories\PrevWorksInterface;
use App\UseCases\Cvs\CvService;
use Illuminate\Http\Request;

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
    public function search(Request $request)
    {   
        // dd($request->gender);
        // $query = Cv::orderByDesc('id');

        // if (!empty($value = $request->gender)) {
        //     $query->where('gender', $value);
        // }

        // if (!empty($value = $request->locate_city)) {
        //     $query->where('locate_city', $value);
        // }

        // if (!empty($value = $request->salary)) {
        //     $query->where('salary', $value);
        // }

        // if (!empty($value = $request->specialization)) {
        //     $query->where('specialization ', $value);
        // }

        // if (!empty($min_age = $request->min_age) && (!empty($max_age = $request->max_age)) ) {
        //     $query->whereBetween('age', [$min_age, $max_age]);
        // }

        // $cvs = $query->paginate(20);
        $cvs = $this->service->getAllCv();

        return view('site.search', compact('cvs'));
    }
}
