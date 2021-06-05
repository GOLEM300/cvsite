<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(User $user)
    {
        $cvs = Cv::where('user_id', $user->id)->get();
        return view('profile.list',compact('cvs'));
    }
}
