<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Apiv1Controller extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {

        $data = [
            'message' => 'API V1',
        ];
        dd($data);
    }

    public function createusers(Request $request): void
    {

        $data = [
            'name' => $request->name,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => $request->password,
        ];
        DB::table('users')->insert($data);
    }
    public function users(Request $request): \Illuminate\Http\JsonResponse
    {
            $users = DB::table('users')->get();
            return response()->json($users);
    }


    public function createu(Request $request): \Illuminate\Http\JsonResponse
    {

        $data = [
            'name' => $request->name,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => $request->password,
        ];
        DB::table('users')->insert($data);

        $users = DB::table('users')->get();
        return response()->json($users);
    }


    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
        return response()->json(['message' => 'Successfully created user!']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token', ['expiration' => 7 * 24 * 60 * 60]);
        $token = $tokenResult->plainTextToken;

        return response()->json([
            'data' => [
                'user' => Auth::user(),
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::now()->addSeconds(7 * 24 * 60 * 60)->toDateTimeString(),
            ]
        ]);

    }

}
