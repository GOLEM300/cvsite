<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\UseCases\Auth\RegisterService;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    private $service;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterService $service)
    {
        $this->middleware('guest');
        $this->service = $service;
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Create a new user instance.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(RegisterRequest $request)
    {
        $this->service->register($request);
        return redirect()->route('login')
        ->with('success', 'Check your email and click on the link to verify.');
    }
}
