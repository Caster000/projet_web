<?php

namespace App\Http\Controllers\Auth;

use App\Campus;
use App\Http\Controllers\Controller;
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

    protected $table = 'personne';

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

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
            'name' => ['required', 'string', 'max:255'],
            'surname'=>['required','string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:personne'],
            'password' => ['required', 'string', 'min:6', 'confirmed', function($attribute, $value, $fail){
                if(!preg_match('/.*[A-Z].*/',$value) || !preg_match('/.*[0-9].*/',$value)){ $fail('Le mot de passe doit contenir au minimum une majuscule et un chiffre'); }
            }],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Personne
     */
    protected function create(array $data)
    {
        return \App\Personne::create([
            'nom' => $data['name'],
            'prenom' => $data['surname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'id_role'=>1,
            'id_campus'=>$data['campus'],
        ]);

    }
    protected function showRegistrationForm(){
        $campus = Campus::all();
        return view('auth.register',compact('campus'));
    }
}
