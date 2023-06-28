<?php

namespace sisretp\Http\Controllers\Auth;

use Exception;
use sisretp\User;
use sisretp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Log;
use Mail;
use sisretp\Empresa;

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
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $empresa = Empresa::first();
        return view('auth.register', compact('empresa'));
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
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'confirmed'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \sisretp\User
     */
    protected function create(array $data)
    {
        $usuario = User::create([
            'name' => mb_strtoupper($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'foto' => 'user_default.png',
            'tipo' => $data['tipo'],
            'status' => 0
        ]);

        try {
            $data['usuario_id'] = $usuario->id;
            $data['email'] = $usuario->email;
            Mail::send('mails.confirma_correo', $data, function ($msj) use ($data) {
                $msj->from('factura@webfactu.com', 'SISRETP');
                $msj->subject('Confirmar correo');
                $msj->to($data['email']);
            });
            Log::debug("envio");
        } catch (\Exception $e) {
            Log::debug("no envio");
            Log::debug("error: " . $e->getMessage());
            $usuario->status = 1;
            $usuario->save();
        }

        return $usuario;
    }
}
