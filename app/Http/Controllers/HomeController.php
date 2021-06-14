<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CvQueriesInterface;

class HomeController extends Controller
{
    private $cvQueries;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CvQueriesInterface $cvQueries)
    {
        $this->middleware('auth');
        $this->cvQueries = $cvQueries;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cvs = $this->cvQueries->getAllCv();
        return view('site.search',compact('cvs'));
    }
}
