<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  public  function index(){
     $user = Auth::guard('customer')->user() ?? Auth::guard('web')->user();
     $userId = $user?->id;
        
    $item = Cart::with('product')
        ->when($user, function ($query) use ($user, $userId) {
            $query->where('userable_type', get_class($user))
                  ->where('userable_id', $userId);
        }, function ($query) {
            $query->where('ip', request()->ip());
        })
        ->get();

        $product = Product::where('status', true)->first();
        if($user && $userId){
         session()->put('checkout_item', $item);
        session()->put('checkout_product', $product);
        session()->put('checkout_UserId', $userId);
        session()->put('checkout_User', $user);


        }
        
        return view('Frontend.Cart.addToCart',compact('item','product'));
    }

  

  public  function addToCart(Request $request,$id){
        if(!Product::where('id',$id)->exists()){
            return  response()->json(['status' => 'error','msg' => 'Product not found'], 404);
        }

        $userableType = null;
        $userableId = null;
        $ip = null;

    if (Auth::guard('customer')->check()) {
        $userableType = Customers::class;
        $userableId = Auth::guard('customer')->id();
    } elseif (Auth::guard('web')->check()) {
        $userableType = User::class;
        $userableId = Auth::guard('web')->id();
    } else {
        $userableType = 'Guest';
        $userableId =session()->getId(); // Or: $request->ip()
        $ip = $request->ip();
    }

        if(!$this->isExists($request,$id)){
            // create
            $cart = new Cart();
            $cart->ip =  $ip ?? null;
            $cart->userable_id = auth()->user()->id ?? Auth::guard('customer')->user()->id ?? $userableId;
            $cart->product_id = $id;
            $cart->qty = 1;
            $cart->userable_type = get_class(auth()->user() ?? Auth::guard('customer')->user()) ?? $userableType;
            $cart->save();

        } else{
            // update
           $this->qtyUpdate($id);
        }
        return response()->json(['status' => 'success' ,'msg' =>'Product has been added!']);
    }


   public function summery(){
   
 if (!Auth::guard('customer')->check() && !Auth::guard('web')->check()) {
        return response()->json([
            'status' => 'unauthenticated',
            'message' => 'Please login to view the cart.'
        ], 401);
    }
// $userId = auth()?->user()?->id ?? Auth::guard('customer')->user()?->id ;
//  $user = auth()?->user()?->id ?? Auth::guard('customer')->user();
// $cart = Cart::with('product:id,slug,title,price,selling_price,featured_image')
//     ->where(function ($q) use ($userId,$user) {
//         $q->where('ip', request()->ip());

//         if ($userId && $user) {
//             $q->where('userable_type',$user)->orWhere('userable_id', $userId);
            
//         }
//     })->get();
    $customer = Auth::guard('customer')->user();
    $webUser = Auth::guard('web')->user();
    $user = $customer ?? $webUser;

    $cart =Cart::with('product:id,slug,title,price,selling_price,featured_image')
        ->when($user, function ($query) use ($user) {
            $query->where('userable_type', get_class($user))
                  ->where('userable_id', $user->id);
        }, function ($query) {
            $query->where('ip', request()->ip());
        })
        ->get();
    
         $products =  $cart->pluck('product');
         $total =  0;
         
         foreach ($products as $product) {
         
          $total += (!$product->selling_price ? $product->price : $product->selling_price) * $cart->where('product_id',$product->id)->first()->qty;
          $product->featured_image = asset('storage/' . $product->featured_image);
        }
          return response()->json([
            'status' => 'success',
            'msg' => 'Cart summery',
            'cart' => $cart,
            'total' => $total,
            'products' => $products
          ]);
   }




     public function removeFromCart(Request $request, $id = null)
{
    // Ensure product ID is provided
    if (!$id) {
        return response()->json([
            'status' => 'error',
            'msg' => 'Product ID is required'
        ], 400);
    }

    // Delete from cart based on IP or Authenticated user
    // Cart::where(function ($query) {
    //     $query->where('ip', request()->ip());
        
    //     if (auth()->check()) {
    //         $query->orWhere('userable_id', auth()->id());
    //     }
    // })

    $user = auth()->user() ?? Auth::guard('customer')->user();
    $userId = $user?->id;
    $userType = $user ? get_class($user) : null;

    Cart::where(function ($query) use ($userId, $userType) {
        $query->where('ip', request()->ip());

        if ($userId && $userType) {
            $query->orWhere(function ($q) use ($userId, $userType) {
                $q->where('userable_id', $userId)
                ->where('userable_type', $userType);
            });
        }
    })

    ->where('product_id', $id)
    ->delete();

    return response()->json([
        'status' => 'success',
        'msg' => 'Product has been removed from cart'
    ], 200);
}



    private function isExists(Request $request, $id = null){
        
        // $ipAddress = $request->ip() ?? null;
        // return  Cart::where(function ($q) use($ipAddress){
        //   return  $q->where('ip', $ipAddress)->orWhere('userable_id', auth()?->user()?->id);
        // })->where('product_id', $id)->exists();

        $userId = auth()?->user()?->id ?? Auth::guard('customer')->user()?->id;
        $userType = auth()?->check() ? get_class(auth()->user()) : get_class(Auth::guard('customer')->user());

        return  Cart::where(function ($q) use( $userId, $userType){
            // $q->where('ip', $ipAddress);

            if ($userId && $userType) {
                $q->orWhere(function ($q2) use ($userId, $userType) {
                    $q2->where('userable_id', $userId)
                    ->where('userable_type', $userType);
                });
            }
        })->where('product_id', $id)->exists();

    }



/*
  function qtyUpdate($id = null,$operator = 'increment', $qty = 1){
    // update
    if(!Product::where('id',$id)->exists()){
            return  response()->json(['status' => 'error','msg' => 'Product not found'], 401);
        }

//    $query = Cart::query()->where(function ($q) {
//           return  $q->where('ip',request()->ip())->orWhere('userable_id', auth()?->user()?->id);
//           })->where('product_id', $id);
   $userId = auth()?->user()?->id ?? Auth::guard('customer')->user()?->id;
   $userType = auth()?->check() ? get_class(auth()->user()) : get_class(Auth::guard('customer')->user());

   $query = Cart::query()->where(function ($q) use ($userId, $userType) {
       $q->where('ip', request()->ip());

       if ($userId && $userType) {
           $q->orWhere(function ($q2) use ($userId, $userType) {
               $q2->where('userable_id', $userId)
                  ->where('userable_type', $userType);
           });
       }
   })->where('product_id', $id);



    if($operator == 'increment'){
        $query->increment('qty', $qty);
    } else  if($operator == 'decrement'){
        $query->decrement('qty', $qty);
    } else{
                return  response()->json(['status' => 'error','msg' => 'Inavalid operator'], 401);

    }

  }
*/
function qtyUpdate($id = null, $operator = 'increment', $qty = 1)
{
    if (!Product::where('id', $id)->exists()) {
        return response()->json(['status' => 'error', 'msg' => 'Product not found'], 401);
    }

    $user = auth()->user() ?? Auth::guard('customer')->user();
    $userId = $user?->id;
    $userType = $user ? get_class($user) : null;

    $query = Cart::query()->where(function ($q) use ($userId, $userType) {
        $q->where('ip', request()->ip());

        if ($userId && $userType) {
            $q->orWhere(function ($q2) use ($userId, $userType) {
                $q2->where('userable_id', $userId)
                   ->where('userable_type', $userType);
            });
        }
    })->where('product_id', $id);

    if ($operator === 'increment') {
        $query->increment('qty', $qty);
    } elseif ($operator === 'decrement') {
        $query->decrement('qty', $qty);
    } else {
        return response()->json(['status' => 'error', 'msg' => 'Invalid operator'], 401);
    }
}



public function updateCart(Request $request)
{

    $updates = $request->input('updates');

    if (!$updates || !is_array($updates)) {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid data format.'
        ], 422);
    }

    foreach ($updates as $cartId => $qty) {
        if ($qty < 1) continue;

        $cartItem = Cart::find($cartId);
        if ($cartItem) {
            $cartItem->qty = $qty;
            $cartItem->save();
        }
    }
    return response()->json(['status' => 'success']);
    }
}


