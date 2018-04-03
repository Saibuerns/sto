<?php

namespace App\Http\Controllers\Auth;

use App\Models\Entity;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->model = $user;
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $entitys = Entity::all();
        return view('auth.register')->with('entitys', $entitys);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $this->model->setAttribute('lastName', $data['lastName']);
        $this->model->setAttribute('firstName', $data['firstName']);
        $this->model->setAttribute('email', $data['email']);
        $this->model->setAttribute('password', $data['password']);
        if (isset($data['box'])) {
            $this->model->setAttribute('idBox', $data['box']);
        }
        $saved = $this->model->save();
        if ($saved) {
            alert()->success('Usuario creado exitosamente', '¡NUEVO USUARIO CREADO!');
            return $this->model;
        }
    }
}
