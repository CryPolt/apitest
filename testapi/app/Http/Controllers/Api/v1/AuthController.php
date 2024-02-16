<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function index()
    {
        $users = User::all();
        return $this->sendResponse($users, 'All User');

    }

    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('AuthToken')->plainTextToken;
        $success['username'] = $user->name;
        return $this->sendResponse($success, 'User Created');
    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] = $user->createToken('AuthToken')->plainTextToken;
            $success['username'] = $user->name;
            return $this->sendResponse($success, 'User Logged');

        }
        return $this->sendError('Unauthorised', ['error' => 'Unauthorised'] );
    }

}
