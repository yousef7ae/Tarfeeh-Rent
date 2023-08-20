<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class serviceController extends Controller
{

    public function index()
    {
       $user = auth('sanctum')->user();

       $services = $user->services;

       return response()->json([
           'status' => true,
           'data' => $services
       ]);
    }

    public function create()
    {

    }
}
