<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function users(Request $request)
    {
            $users = DB::table('users')->get();
            return response()->json($users);
    }
}
