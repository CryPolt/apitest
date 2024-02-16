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



}
