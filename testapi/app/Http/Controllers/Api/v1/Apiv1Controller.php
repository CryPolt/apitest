<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
