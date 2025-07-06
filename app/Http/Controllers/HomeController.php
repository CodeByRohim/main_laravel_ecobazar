<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Banner;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('status', true)
            ->with(['category', 'brand'])
            ->latest()
            ->take(8)
            ->get();
          $categories = $products->pluck('category')->unique('id');
          $banners = Banner::where('status', true)->take(3)->latest()->get();
          
        return view('Frontend.home' , compact('products','categories','banners'));
    }

    function getCategoryProducts($slug)
    {
        $products = Product::where('status', true)
            ->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->with(['category', 'brand'])
            ->latest()
            ->paginate(10);
         $productsCount = $products->count();
        if ($productsCount == 0) {
            $productsCount = 'No products found in this category.';
        }
        return view('Frontend.category_archeive', compact('products', 'productsCount'));
    }

    function getSingleProducts($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('status', true)
            ->with(['category', 'brand'])
            ->firstOrFail();
       if($product->gallery_image) {
             $galleryImages = collect(json_decode($product->gallery_image, true));
             $galleryImages = $galleryImages->count() >= 3 ? $galleryImages->random(3) : $galleryImages;
        }
       $relatedProducts = Product::whereHas('category', function ($query) use ($product){
        return $query->where('id', $product->category->id);
       })->where('id', '!=', $product->id)
            ->where('status', true)
            ->get();
            
        return view('Frontend.single_products', compact('product','galleryImages', 'relatedProducts'));
    }

    function searchProducts(Request $request){
       $search = $request->search;
       if(!empty($search)){
        $products = Product::whereLike('title', '%' . $search . '%')->where('status', true)->select('id','title','slug')->latest()->limit(30)->get();
       }
       return response()->json($products,200);
    }

    // function search(Request $request){
     
    //    $search = $request->search;
    //    $products = [];
    //   if(!empty($search)){
    //     $products = Product::whereLike('title', '%' . $search . '%')->where('status', true)->with(['category','brand'])->latest()->paginate(10);
      
    // }
    //     $productsCount = $products->count();
    //     if ($productsCount == 0) {
    //         $productsCount = 'No products found in this category.';
    //     }
    //    return view('Frontend.search', compact('products','productsCount'));
    // }



    public function search(Request $request)
{
    $search = $request->search;
    $products = collect(); // default empty collection

    if (!empty($search)) {
        $products = Product::where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhereHas('category', function ($q) use ($search) {
                          $q->where('title', 'like', "%{$search}%");
                      })
                      ->orWhereHas('brand', function ($b) use ($search) {
                          $b->where('title', 'like', "%{$search}%");
                      });
            })
            ->where('status', true)
            ->with(['category', 'brand'])
            ->latest()
            ->paginate(10);
    }

    $productsCount = $products->count();
    if ($productsCount == 0) {
        $productsCount = 'No products found in this category.';
    }

    return view('Frontend.search', compact('products', 'productsCount'));
}
}
