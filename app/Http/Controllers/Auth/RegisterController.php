<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Coupon;
use App\Models\SorteoSmash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Random;
use Carbon\Carbon;

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
        if ($data['codigo']!="") {
            $cupon = Coupon::where('codigo_promocional', $data['codigo'])->first();
            if (!$cupon) {
                return Validator::make($data, [
                    'codigo' => ['required', 'string', 'min:50000']
                ]);
            }
        }

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'numero_doc' => ['required', 'string', 'max:12', 'unique:users'],
            'direccion' => ['required', 'string', 'max:255'],
            'fecha_nac' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:9'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'tipo_doc' => $data['tipo_doc'],
            'numero_doc' => $data['numero_doc'],
            'direccion' => $data['direccion'],
            'departamento' => $data['departamento'],
            'provincia' => $data['provincia'],
            'distrito' => $data['distrito'],
            'fecha_nac' => $data['fecha_nac'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'codigo_promocional' => $data['codigo']
        ]);

        if ($data['codigo']) {
            $cupon = Coupon::where('codigo_promocional', $data['codigo'])->first();
            $fecha_registro = Carbon::now();
            for ($i=0; $i < $cupon->cantidad; $i++) { 
                SorteoSmash::create([
                    'user_id' => $user->id,
                    'fecha_registro' => $fecha_registro
                ]);
            }
        }

        return $user;

    }
}
