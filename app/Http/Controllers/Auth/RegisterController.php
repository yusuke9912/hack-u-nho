<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

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
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'sei' => ['required', 'string', 'max:255'],
            // 'mei' => ['required', 'string', 'max:255'],
            // 'sei_kana' => ['required', 'string', 'max:255'],
            // 'mei_kana' => ['required', 'string', 'max:255'],
            // 'address' => ['required', 'string', 'max:255'],
            // 'gender' => ['required', 'string', 'max:10'],
            // 'age' => ['required', 'integer'],
            // 'self_introduction' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'sei' => $data['sei'],
            'mei' => $data['mei'],
            'sei_kana' => $data['sei_kana'],
            'mei_kana' => $data['mei_kana'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'self_introduction' => $data['self_introduction'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
