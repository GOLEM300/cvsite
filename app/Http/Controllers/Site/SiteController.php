<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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

    public function show(Cv $cv, PrevWorksInterface $prevWorksExp)
    {
        $user_cv = $this->service->getUserCv($cv->id);
        $busyness = $this->service->getBusyness($user_cv);
        $sheduleType = $this->service->getSheduleType($user_cv);
        return view('site.show',compact('user_cv','prevWorksExp','busyness','sheduleType'));
    }

    public function search(PrevWorksInterface $prevWorksExp, Filter $filter)
    {   
        $cvs = $this->service->getAllCv();
        return view('site.search',compact('cvs','prevWorksExp'));
    }
}
