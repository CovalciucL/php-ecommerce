<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Models\User;

class AuthController extends BaseController
{
    public function __construct()
    {   
        if(isAuthenticated()){
            Redirect::to('/public/');
        }
    }
    public function showRegisterForm()
    {   
        return view('register');
    }
    public function register()
    {
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){
                $rules = [
                    'username' => ['required' => true, 'maxLength' => 20, 'string' => true, 'unique' => 'users'],
                    'email' => ['required' => true, 'email' => true, 'unique' => 'users'],
                    'password' => ['required' => true, 'minLength' => 6],
                    'fullname' => ['required' => true, 'maxLength' => 50, 'string' => true],
                    'address' => ['required' => true, 'minLength' => 4, 'maxLength' => 500, 'mixed' => true],
                ];
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);
                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
                    return view('register', ['errors' => $errors]);
                }
                User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => password_hash($request->password, PASSWORD_BCRYPT),
                    'fullname' => $request->fullname,
                    'address' => $request->address,
                    'role' => 'user'
                ]);
                Request::refresh();
                return view('login',['success' => 'Account Created, please login']);

            }
            throw new \Exception('Token Missmatch');
        }
        return null;
    }
    public function showLoginForm()
    {   
        return view('login');
    }
    public function login()
    {
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){
                $rules = [
                    'username' => ['required' => true],
                    'password' => ['required' => true],
                ];
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);
                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
                    return view('login', ['errors' => $errors]);
                }
                $user = User::where('username', $request->username)->orWhere('email', $request->username)->first();

                if($user){
                    if(!password_verify($request->password, $user->password)){
                        Session::add('error','Incorrect password');
                        return view('login');
                    }else{
                        Session::add('SESSION_USER_ID', $user->id);
                        Session::add('SESSION_USER_NAME', $user->username);
                        if($user->role == 'admin'){
                            Redirect::to('/public/admin');
                        }elseif($user->role == 'user' && Session::has('user_cart')){
                            Redirect::to('/public/cart');
                        }else{
                            Redirect::to('/public/');
                        }
                    }
                }else{
                    Session::add('error', 'User not found, please try again!');
                    return view('login');
                }
            } else{
                throw new \Exception('Token Missmatch');
            }
        }
        return null;
    }
    public function logout()
    {
        if(isAuthenticated()){
            Session::remove('SESSION_USER_ID');
            Session::remove('SESSION_USER_NAME');
            if(!Session::has('user_cart')){
                session_destroy();
                session_regenerate_id(true);
            }
        }
        Redirect::to('/public/');
    }
};
