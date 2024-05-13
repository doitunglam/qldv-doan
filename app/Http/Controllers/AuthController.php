<?php

namespace App\Http\Controllers;

use App\Models\Doanvien;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Resources\Product as ProductResource;

class AuthController extends BaseController
{
    // Return login page
    public function view()
    {
        return view('login');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        $response = new \stdClass;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'Quyen' => 10])) {
            $user = Auth::user();

            $response->message = "Đăng nhập thành công";
            $response->status = 1;
            $response->request = $request;
            // $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            // $success['name'] =  $user->name;

            $request->session()->regenerate();

        } else {
            $response->message = "Đăng nhập thất bại, vui lòng kiểm tra thông tin";
            $response->status = 0;
        }
        return $this->sendResponse($response, "Submit OK");
    }

    // Do logout action
    public function remove()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function handleGoogleCallback(Request $request)
    {
        //create a user using socialite driver google
        $mailUser = Socialite::driver('google')->stateless()->user();
        // if the user exits, use that user and login
        $email = $mailUser->email;

        // try to get user base on the email
        $user = Doanvien::where('Email', '=', $email)->first();

        if (! isset($user)) {
            abort(404);
        } else {
            $taikhoan = User::where('email', '=', $email)->first();

            if (!isset($taikhoan))
            {
                $dulieu = ["id"=> $email, "name"=>$email, "email" => $email, "password" =>Hash::make("P@ssword123"), "Quyen" => 0 ];
                User::create($dulieu);
            }
            Auth::attempt(['email' => $email, 'password' => "P@ssword123"]);
            $request->session()->regenerate();

            $user = Auth::user();
            return redirect('/');
        }
    }
}
