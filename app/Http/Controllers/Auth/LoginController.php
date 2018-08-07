<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth,Crypt,Mail;
use App\User;
use App\Http\Requests\RecoveryRequest;
use App\Contracts\UserInterface;
use App\Mail\RecoverPassword;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $userInterface;
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function recoveryForm()
    {
        return view('auth.passwords.reset');
    }

    public function recoverPassword(RecoveryRequest $request)
    {
       $email = [$request->email];
       $requestData['password'] = Crypt::encrypt($request->password); 
       $getPassword = $this->userInterface->recoveryPassword($email,$requestData);
       if($getPassword==1)
       {
         $getUserdata = $this->userInterface->findRecoveredData($email);   
         Mail::to($email)->send(new RecoverPassword($getUserdata));
         return redirect('recover-password')->with('password_recover_success','Your password has been successfully reset. Please check your inbox!!');
       }
       else
       {
        return redirect('recover-password')->with('password_recover_failure','Unable to recover password!!');
       }

    }
}
