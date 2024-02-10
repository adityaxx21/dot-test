<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;

            return response()->api([['token' => $token]]);
        }
        return response()->apiError(404, "Invalid login credentials");
    }

    public function signup(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:8',
            ])->validate();
        
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);
        
            $token = $user->createToken('token-name')->plainTextToken;
        
            return response()->api([['token' => $token]]);
        } catch (ValidationException $e) {
            // Validation failed
            return response()->apiError(422, $e->validator->errors());
        } catch (\Exception $e) {
            // Other exceptions (e.g., database errors)
            return response()->apiError(500, 'Failed to create user');
        }
    }
}
