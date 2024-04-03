<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        if (!$email || !$password) {
            return response()->json(['message' => 'Email or password missing'], 400);
        }

        $url = 'https://fa-exyn-test-saasfaprod1.fa.ocs.oraclecloud.com//hcmRestApi/resources/11.13.18.05/emps';


        
            $response = Http::withBasicAuth($email, $password)
            ->get($url);

            if ($response->status() == 200) {
                $response_data=json_decode( $response->body());
                return response()->json(['message' => $response_data], 200);
            } else {

                return response()->json(['message' => 'Login failed'], $response->status());
            }
    }
}
