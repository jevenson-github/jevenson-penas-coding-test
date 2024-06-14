<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// IMPORT MODEL TO BE USE 
use App\Models\Product\Products; 
class ProductController extends Controller
{
    // 
    public function index(){
       $data = Products::all(); 
       return response()->json($data, 200);
    }
}
