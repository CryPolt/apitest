<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Apiv2Controller extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {

        $data = [
            'message' => 'API V2',
        ];
            dd($data);
    }
}
