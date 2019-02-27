<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile(Request $request){
        $user = \Auth::user();
        return response()->json(compact('user'));
    }
}
