<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
    //
    public function index(){
        $products = Product::where('status', true)
            ->with(['category', 'brand'])
            ->latest()
            ->paginate(10);
        $productsCount = $products->count();
        if ($productsCount == 0) {
            return 'No products found.';
        }
        return view('Frontend.category_archeive', compact('products', 'productsCount'));
    }
}
