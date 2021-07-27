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
            'nik'  => ['nullable'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'temp_lahir'  => ['nullable'],
            'tanggal'  => ['nullable'],
            'umur'  => ['nullable'],
            'agama'  => ['nullable'],
            'alamat'  => ['nullable'],
            'pendidikan'  => ['nullable'],
            'pekerjaan'  => ['nullable'],
            'no_hp'  => ['nullable'],
            'foto'  => ['nullable'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $file     = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file     ->move(public_path('foto'),$filename);

        return User::create([
            'nik'        => (isset($data['nik']) ? $data['nik'] : '0'),
            'name'       => $data['name'],
            'email'      => $data['email'],
            'temp_lahir' => (isset($data['temp_lahir']) ? $data['temp_lahir'] : '0'),
            'tanggal'    => (isset($data['tanggal']) ? $data['tanggal'] : '0'),
            'umur'       => (isset($data['umur']) ? $data['umur'] : '0'),
            'agama'      => (isset($data['agama']) ? $data['agama'] : '0'),
            'alamat'     => (isset($data['alamat']) ? $data['alamat'] : '0'),
            'pendidikan' => (isset($data['pendidikan']) ? $data['pendidikan'] : '0'),
            'pekerjaan'  => (isset($data['pekerjaan']) ? $data['pekerjaan'] : '0'),
            'no_hp'      => (isset($data['no_hp']) ? $data['no_hp'] : '0'),
            'foto'       => $filename,
            'password'   => Hash::make($data['password']),
        ]);
        // if (request()->hasFile('foto')) {
        //     $foto = request()->file('foto')->getClientOriginalName();
        //     request()->file('foto')->storeAs('storage/foto',$user->id .'/'. $foto, '');
        //     $user->update(['foto'=>$foto]);
        // }
        // return $user;
    }
}
