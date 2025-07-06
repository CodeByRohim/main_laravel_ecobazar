<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        $products = Product::select('id','title','qty','alert_qty')
            ->whereColumn('qty', '<=', 'alert_qty')
            ->get();

        return view('Backend.Stock.lowStock',compact('products'));
    }
    
}
