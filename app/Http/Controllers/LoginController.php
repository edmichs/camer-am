<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 03/12/2018
 * Time: 05:55
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    public function login(Request $request)
    {
        
       
        $this->validate($request,[
            'identifiant' => 'required',
            'password' => 'required',
        ]);
        $credentials  = $request->only('identifiant','password');
        $user = Auth::attempt($credentials,true);

        if (!$user){
            return redirect()->back()->with(['error' => 'Identifiant/Password incorrect']);
        }else{
            $current_user = User::whereIdentifiant($credentials['identifiant'])->first();
            session(['user' => $current_user]);
            return redirect(route('accueil_path'));
            // return Cache::get('etablissement');

        }

    }

    public function logout()
    {
        request()->session()->flush();

        request()->session()->regenerate(true);

        return redirect('/');
    }

}