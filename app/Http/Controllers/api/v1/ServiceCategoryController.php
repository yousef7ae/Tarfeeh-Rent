<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $services_categories = ServiceCategory::get();

        return response()->json([
            'status' => true,
            'data' => $services_categories
        ]);
    }

}
