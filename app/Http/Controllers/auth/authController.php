<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password as FacadesPassword;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;


class authController extends Controller
{
    /**
     * login
     * logout
     * reset password
     * forgot password
     *
     */
    //
    public function showLogin(string $guard)
    {
        // dd(session('guard'));
        $validator = validator(['guard' => $guard], ['guard' => 'required|string|in:admin,user']);
        if (!$validator->fails()) {
            session()->put(['guard' => $guard]);
            return response()->view('pages.Auth.login');
        }
        abort(404, 'page not found');
    }
    public function login(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => "required|email|string|exists:admins",
            'password' => ['required', 'string', Password::min('8')->letters()->numbers()->symbols()->uncompromised()],
            'remember_token' => 'required|boolean',
        ]);
        if ($validator->fails()) {
            if (Auth::guard(session('guard'))->attempt(
                $request->only(['email', 'password']),
                $request->input('remember_token')
            )) {

                $request->session()->regenerate();
                return response()->json(['status' => true, 'message' =>  'Logged In Successfully'], Response::HTTP_OK);
            } else {

                return response()->json(['status' => false, 'message' =>  'Wrong Email Or Password'], Response::HTTP_BAD_REQUEST);
            }
        } else {

            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->getMessageBag()->first()
                ],
                Response::HTTP_UNAUTHORIZED
            );
        }
    }
    public function logout(Request $request)
    {
        $guard = session('guard');
        auth($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('auth.show-login', $guard);
    }

    ################################# reset password from auth page ###################
    public function forgetPassword(Request $request)
    {
        return response()->view('pages.Auth.forget-password');
    }
    public function sendResetEmail(Request $request)
    {
        $broker = str::plural(session('guard'));
        $validator = validator($request->all(), ['email' => "required|email|string|exists:$broker,email"]);
        if (!$validator->fails()) {
             FacadesPassword::broker($broker)->sendResetLink(['email' => $request->input('email')]);
            return $status = FacadesPassword::RESET_LINK_SENT ?
                response()->json(['status' => $validator, 'message' => 'Check Your Email'])
                :
                response()->json(['status' => $validator, 'message' => 'Failed To Send Try Again Later'], Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
    public function resetPassword(Request $request, $token)
    {
        // dd($request->input('email'));
        return response()->view('pages.Auth.recover-password', ['token' => $token, 'email' => $request->input('email')]);
    }
    public function recoverPassword(Request $request)
    {
        $validator = validator($request->all(), [
            'token' => 'required',
            'email' => 'required|email|string|exists:password_reset_tokens,email',
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)->letters()->numbers()->symbols()->uncompromised()
            ],
        ]);
        if (!$validator->fails()) {
            $broker = str::plural(session('guard'));
            $status = FacadesPassword::broker($broker)->reset(
                $request->all(),
                function ($user, $password) {
                    $user->forceFill(['password' => Hash::make($password)]);
                    $user->save();
                    event(new PasswordReset($user));
                }
            );
            return $status = FacadesPassword::RESET_LINK_SENT ?
                response()->json(['status' => $validator, 'message' => __($status)])
                :
                response()->json(['status' => $validator, 'message' => __($status)], Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
    #####################Change password insde the dashboard ###################
    public function changePassword()
    {
        return response()->view('pages.Auth.edit-password');
    }

    public function updatePassword(Request $request)
    {
        $validator = validator($request->all(), [
            'current_password' => 'required|current_password:' . session('guard'),
            // 'new_password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()->uncompromised()],
            'new_password' => ['required', 'confirmed'],
        ]);
        if (!$validator->fails()) {
            $user = $request->user(session('guard'));
            $user->password = $request->input('new_password');
            $saved = $user->save();
            return response()->json(
                ['status' => $saved, 'message' => $saved ? 'Password Update Successfully' : 'Failed To Update Password'],
                $saved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
    ####################################### Verify Email ########################################################################################################################
    public function showVerification(Request $request)
    {
        $user = $request->user(session('guard'));
        return view('pages.Auth.verification', ['user' => $user]);
    }

    public function sendEmailVerification(Request $request)
    {
        $request->user(session('guard'))->sendEmailVerificationNotification();

        return response()->json(['status' => true, 'message' => 'Email Has Been Verification Sent Successfully'],);
    }
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('dashboard');
    }
}
