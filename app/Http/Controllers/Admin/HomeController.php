<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function show()
    {
        return view('admin.show');
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function remove()
    {
        
    }

    public function update()
    {

    }

    public function edit(User $user)
    {
        return view('admin.edit');
    }

}