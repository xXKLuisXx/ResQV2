<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Mail\VerificationMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/historia';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verification(Request $request){
        if ($request->user_id == \Auth::id()) {
            $user = User::find($request->input('user_id'));
            if (hash('sha256', $request->input('api_token')) == $user->api_token){
                $user->email_verified_at = Carbon::now();
                $user->save();
            }
        } else {

        }
        return redirect('/historia');
    }
    public function resent(Request $request){
        if ($request->user_id == \Auth::id()) {
            $user = User::find($request->input('user_id'));
            $enlace = "http://127.0.0.1:8000/verificationEmail?api_token=".hash('sha256', $user->email)."&user_id=".$user->id;
            Mail::to($user)->send(new VerificationMail($enlace));
        } else {

        }
        return view('auth.verify');

    }
}
