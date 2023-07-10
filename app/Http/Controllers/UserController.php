<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    //
    private UserService $userService;
    
    function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login():Response
    {
        $title = "Login";
        return response()->view('user.login',compact('title'));
    }

    public function doLogin(Request $request)
    {
        $user = $request->input('user');
        $password = $request->input('password');

        // validate input
        if(empty($user)||empty($password)){
            return response()->view('user.login',[
                'title' => 'login',
                'error' => 'User or Password is required'
            ]);
        }

        if($this->userService->login($user,$password)){
            $request->session()->put("user",$user);
            return redirect("/");
        }

        return response()->view("user.login",[
            "title" => "Login",
            "error" => "User or password wrong"
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget("user");
        return redirect("/");
    }
}
