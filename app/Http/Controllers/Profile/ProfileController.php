<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        //
    }

    public function list(User $user, Cv $collection)
    {
        $cvs = $collection->getCvs($user->id);
        return view('profile.list',compact('cvs'));
    }
}
