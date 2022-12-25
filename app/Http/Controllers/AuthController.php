<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

use App\Models\Users;
use App\Models\Profiles;
use App\Models\Roles;
use App\Models\AccessToken;
use App\Models\VerificationTokenMail;

use App\Mail\SendMailVerifiedAccount;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        return view('auth.signin');
    }

    public function signinPost(Request $request)
    {
        $username = $request->post('username');
        $password = $request->post('password');

        // Check Data Users
        $checkUsers = Users::where('username', $username)->first();
        if($checkUsers != null){

            // Check Password
            $hasPassword = Hash::check($password, $checkUsers->password);
            if($hasPassword == true){

                // get profile
                $profile = Profiles::where('user_id', $checkUsers->id)->first();

                if($profile->is_verified == 1){

                    // create token
                    $now 		 = date('Y-m-d H:i:s');
                    $token       = md5($now);
                    $expires_in  = strtotime('+1 days');
                    $expire_date = date('Y-m-d H:i:s', $expires_in);

                    $createToken = new AccessToken;
                    $createToken->id = Str::uuid();
                    $createToken->user_id = $checkUsers->id;
                    $createToken->token = $token;
                    $createToken->expired_at = $expire_date;
                    $createToken->save();

                    // create session for validation
                    Session::put('id', $profile->id);
                    Session::put('full_name', $profile->full_name);
                    Session::put('email', $profile->email);
                    Session::put('address', $profile->address);
                    Session::put('phone', $profile->phone);
                    Session::put('token', $createToken->token);
                    Session::put('role_id', $checkUsers->role_id);
                    Session::put('login', true);

                    return redirect('dashboard')->with('success', 'Successfully login to dashboard');
                }else{
                    $message = "Login Failed, Account is not verified.";
                    return redirect('auth/sign-in')->with('error', $message);
                }
            }else{

                $message = "Login Failed, Invalid username or password.";
                return redirect('auth/sign-in')->with('error', $message);
            }

        }else{
            $message = "Login Failed, users is not exist.";
            return redirect('auth/sign-in')->with('error', $message);
        }
    }

    public function signup(Request $request)
    {
        return view('auth.signup');
    }

    public function signupPost(Request $request)
    {
        $checkUser = Users::where('username', $request->post('username'))->first();

        if($checkUser == null) {

            $roles = Roles::where('name', 'User')->first();

            $users = new Users;
            $users->id = Str::uuid();
            $users->role_id = $roles->id;
            $users->username = $request->post('username');
            $users->password = Hash::make($request->post('password'));
            $users->save();

            $checkProfile = Profiles::where('email', $request->post('email'))->first();

            if($checkProfile == null) {
                $data = new Profiles;
                $data->id = Str::uuid();
                $data->full_name = $request->post('full_name');
                $data->email = $request->post('email');
                $data->address = $request->post('address');
                $data->phone = $request->post('phone');
                $data->is_verified = false;
                $data->user_id = $users->id;
                $data->save();

                // create token
                $now = date('Y-m-d H:i:s');
                $token = md5($now);
                $expires_in = strtotime('+1 days');
                $expire_date = date('Y-m-d H:i:s', $expires_in);

                $createToken = new VerificationTokenMail;
                $createToken->id = Str::uuid();
                $createToken->user_id = $users->id;
                $createToken->token = $token;
                $createToken->save();

                $details = [
                    'token' => $createToken->token,
                ];
        
                Mail::to($request->post('email'))->send(new sendMailVerifiedAccount($details));
            }else{
                Users::where('id', $users->id)->delete();
            }
        }else{
            $message = 'Account already is exist.';
            return redirect('auth/sign-up')->with('error', $message);
        }

        $message = 'Registered successfully, please check email to verified account';
        return redirect('auth/sign-up')->with('success', $message);
    }

    public function verifiedEmail(Request $request)
    {
        $token = $request->get('token');

        $verification = VerificationTokenMail::where('token', $token)->first();

        if($verification != null) {
            $users = Profiles::where('user_id', $verification->user_id)->first();
            $users->is_verified = true;
            $users->save();

            $verification->delete();

            return view('auth.verification');
        }else{
            return view('auth.404');
        }
    }

    public function sendMailVerified(Request $request)
    {
        // create token
        $now = date('Y-m-d H:i:s');
        $token = md5($now);
        $expires_in = strtotime('+1 days');
        $expire_date = date('Y-m-d H:i:s', $expires_in);

        $createToken = new VerificationTokenMail;
        $createToken->id = Str::uuid();
        $createToken->user_id = $request->post('user_id');
        $createToken->token = $token;
        $createToken->save();

        $details = [
            'token' => $createToken->token,
        ];

        Mail::to($request->post('email'))->send(new sendMailVerifiedAccount($details));

        return response()->json(array('status' => 200, 'message' => 'Send Mail Verification Success'));
    }

    public function signout(Request $request)
    {
        AccessToken::where('token', Session::get('token'))->delete();
        Session::flush();

        return redirect('auth/sign-in');
    }
}
