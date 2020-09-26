<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


  protected function authenticated(Request $request, $user)
  {
      if($user->hasRole('superadministrator')){
      return redirect('/admin/');
      }

    //   if($user->hasRole('user')){
    //       return redirect('/user');
    //   }
    else{
        return redirect('/user');
    }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
