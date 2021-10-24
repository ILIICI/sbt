<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        
        $groupedProducts = $this->showAllProducts();
        return view('index',compact('groupedProducts'));
    }

    public function showAllProducts(){
        $groupedProducts = Product::with('attributes','tags')->simplePaginate(12);
        return $groupedProducts;
    }
}
