<?php 

namespace App\UseCases\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Dispatcher;
use Illuminate\Support\Facades\Hash;

class RegisterService 
{
    private $dispatcher;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function register(RegisterRequest $request): void
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        //$this->dispatcher->dispatch(new Registered($user));
    }
}