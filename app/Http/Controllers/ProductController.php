<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
// use DataTables;
class ProductController extends Controller
{
    public function index(Request $request ,$id = null){
        if($request->ajax()){
         $products = Product::query()->select('*')->with('category','brand');

         
         return DataTables()->of($products)
                 ->addIndexColumn()
                 ->addColumn('featured_image', function($item){
                    $url = $item->featured_image ? asset('storage/'  .$item->featured_image) : 'https://motobros.com/wp-content/uploads/2024/09/no-image.jpeg';
                    return "<img src='$url' alt='Product Image' class='img-fluid' style='width: 50px; height: 50px; object-fit: cover;'/>";
                 })
                ->addColumn('gallery_image', function($item) {
                    $images = json_decode($item->gallery_image, true); 
                    $html = '';

                    if (is_array($images)) {
                        foreach ($images as $img) {
                            $url = asset('storage/' . $img);
                            $html .= "<img src='$url' alt='Product Image' style='width:50px; height:50px; object-fit:cover; margin-right:4px;' />";
                        }
                    } else {
                        // fallback image
                        $html = "<img src='https://motobros.com/wp-content/uploads/2024/09/no-image.jpeg' alt='No Image' style='width:50px; height:50px; object-fit:cover;' />";
                    }

                    return $html;
                })
                ->addColumn('status', function($item){
                    return getGeneralStatus($item->status);

                })
                ->addColumn('actions', function($item){
                    $editUrl = route('products.create', $item->id);
                    $deleteUrl = route('products.delete', $item->id);
                    return "<div class='btn-group'>
                                <a href='$editUrl' class='btn btn-sm btn-primary'>Edit</a>
                                 <a href='$deleteUrl' class='btn btn-sm btn-danger'>Delete</a>
                            </div>";
                               
                            
                 })
                 ->addColumn('category', function($item){
                    return $item->category?->title ?? 'N/A';
                })
                ->addColumn('brand', function($item){
                    return $item->brand?->title ?? 'N/A';
              })
               ->addColumn('long_detail', function($item){
                    $shortText =  Str::limit( strip_tags($item->long_detail),5) ?? 'N/A';
                     $fullText = htmlspecialchars($item->long_detail); 
                    return "<span>$shortText</span> 
                    <a href='#' class='read-more' data-full='$fullText'>Read More</a>";
              })
                ->addColumn('short_detail', function($item){
                    $shortText =  Str::limit( strip_tags($item->short_detail),5) ?? 'N/A';
                    $fullText = htmlspecialchars($item->short_detail); 
                    return "<span>$shortText</span> 
                    <a href='#' class='read-more' data-full='$fullText'>Read More</a>";
              })
                 ->rawColumns(['featured_image','gallery_image','status','actions','category','brand','long_detail','short_detail'])->make(true);
        }
        $products = Product::with(['category', 'brand'])->get();
        $editProduct = Product::find($id) ?? null;
       
   
        return view('Backend.Products.index', compact('products','editProduct','id'));
    }

    public function create($id = null){
         $editProduct = Product::find($id) ?? null;
        $brands = Brand::where('status',true)->latest()->get();
        return view('Backend.Products.create', compact('editProduct','brands'));
    }


    public function storeOrUpdate(ProductRequest $request, $id = null){{
        
       $slug = $this->slugGenerator($request->slug, $request->title);
         if(!$slug && $id == null){
            return to_route('products.create')->withErrors(['slug' => 'Slug already exists, please choose a different one.'])->withInput();
        } else{     
            $slug = str($request->title)->slug();
         
        }
        
        $product = Product::findOrNew($id);

        // ========== FEATURED IMAGES UPLOAD ==========
        if ($request->hasFile('featured_image')) {
            if ($product->featured_image) {
                // Delete old image if exists
                Storage::disk('public')->delete($product->featured_image);
            }
            $name = $slug . "." . $request->featured_image->getClientOriginalExtension();
            $featuredImage = $request->featured_image->storeAs('products', $name , 'public');
            $product->featured_image = $featuredImage;
        } 
       
        // ========== GALLERY IMAGES UPLOAD ==========
        
        if($request->hasFile('gallery_image')){
            $galleryImages = [];
            foreach($request->gallery_image as $index => $image){
                if ($product->gallery_image) {
                // Delete old image if exists
               $oldGalleryImages = json_decode($product->gallery_image, true);
                // Storage::disk('public')->delete($product->gallery_image);
                Storage::disk('public')->delete($oldGalleryImages[$index] ?? '');

            }
            // $name = $slug . "-gallery." . $index . "." . $image->extension();
            $name = $slug . "-gallery." . $index . "." . time() . "." . $image->extension();
            $path = $image->storeAs('products/gallery', $name, 'public');
            $galleryImages[] = $path;
            
            }
           $product->gallery_image = json_encode($galleryImages);
        }
        if($id){
                    $product->status = $request->status ?? false;
                }
         //========== SAVE PRODUCT DATA ==========
        $product->title = $request->title;
        $product->slug = $slug;
        $product->price = $request->price;
        $product->selling_price = $request->selling_price;
        $product->qty = $request->qty;
        $product->brands_id = $request->brand;
        $product->category_id = $request->category;
        $product->short_detail = $request->short_detail;
        $product->long_detail = $request->long_detail;
        $product->alert_qty = $request->alert_qty ?? 0;
        $product->sku = $request->sku;
        $product->additional_info = $request->additional_info;
        $product->video = $request->video_url;
       
        $product->save();

      return to_route('products.index')->with('success', $id ? 'Product updated successfully' : 'Product created successfully');
    }
}
   

 private function slugGenerator($slug,$title, $id = null){
        $isExists = Product::where('slug', $slug)->exists();
        if($isExists){   
            return false;
        } else {
            $slug = str($title)->slug();
            $count = Product::whereLike('slug', "$slug%")->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
            return $slug;
        }
    }
   function liveCategory(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::query()->where('status',true)->select('id', 'title');
        // $products = Product::query()->where('status',true)->select('id','title');
        if($search) {
            $categories = $categories->whereLike('title', "%$search%");
            // $products = $products->whereLike('title', "%$search%");
        } 
        $categories = $categories->limit(3)->get();
        // $products = $products->latest()->get();
        $resArray = [];
        // if($resArray){
        //     $resArray['categories'] = $categories;
        //     $resArray['products'] = $products;
        // }
        // foreach ($products as $product) {
        //     $resArray[] = [
        //         'id' => $product->id,
        //         'text' => $product->title,
        //     ];
        // }
        foreach ($categories as $category) {
            $resArray[] = [
                'id' => $category->id,
                'text' => $category->title,
            ];
        }
      
        return response()->json($resArray);
    }


    public function liveBrand(Request $request)
{
    $search = $request->input('search');
    $brands = Brand::query()->where('status', true) ->select('id', 'title');

    if ($search) {
        $brands = $brands->whereLike('title', "%$search%");
    }

    $brands = $brands->limit(3)->get();

    $resArray = [];
    foreach ($brands as $brand) {
        $resArray[] = [
            'id' => $brand->id,
            'text' => $brand->title,
        ];
    }

    return response()->json($resArray);
}


// public function getData(Request $request)
// {
//     $products = Product::select([
//         'id', 'title', 'price', 'selling_price',
//         'qty', 'alert_qty', 'short_detail', 'long_detail',
//         'featured_image', 'gallery_image', 'additional_info',
//         'video'
//     ]);

//     return DataTables::of($products)
//         ->addColumn('actions', function ($row) {
//             return '<a href="#" class="btn btn-sm btn-primary">Edit</a>';
            
//         })
//         ->rawColumns(['actions']) // যদি HTML থাকে
//         ->make(true);
// }


public function delete($id)
{
    $product = Product::findOrFail($id);
    if ($product->featured_image) {
        Storage::disk('public')->delete($product->featured_image);
    }
    if ($product->gallery_image) {
        $galleryImages = json_decode($product->gallery_image, true);
        foreach ($galleryImages as $image) {
            Storage::disk('public')->delete($image);
        }
    }
    $product->delete();
    return redirect()->back()->with('success', 'Product deleted successfully');
}
}