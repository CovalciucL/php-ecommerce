<?php

namespace App\Classes;

class CSRFToken
{
    public static function token()
    {   
        if (!Session::has('token')) {
            $randomToken = base64_encode(openssl_random_pseudo_bytes(32));
            Session::add('token',$randomToken);
        }

        return Session::get('token');
    }

    public static function verifyCSRFToken($requestToken,$regenerate = true)
    {
        if (Session::has('token') && Session::get('token') === $requestToken) {
            if($regenerate){
                Session::remove('token');
            }
            return true;
        }
        
        return false;
    }
}