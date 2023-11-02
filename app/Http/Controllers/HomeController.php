<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index(Request $request){
        $numberOfUser = $request['noUser'] ?? 1;

        $getUser = self::sendRequet($numberOfUser);
        $getUsers = json_decode($getUser,true);        
        return view('userList', compact('getUsers'));

    }



   private function sendRequet($totalUsers){
    $response = Http::get('https://randomuser.me/api/?'.'results='.$totalUsers);
        if($response->status() != 200){
            $response = Http::get('https://www.boredapi.com/api/activity');
        }
    return $response->body();

   } 
}
