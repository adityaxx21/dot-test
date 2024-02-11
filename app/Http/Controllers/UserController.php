<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $user = auth('sanctum')->user();
        if ($user) {
            return response()->api([$user]);
        }
        return response()->apiError();
    }
}
