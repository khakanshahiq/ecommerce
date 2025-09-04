<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Orderitem;







class FrontendController extends Controller
{
    
public function index(Request $request){


    
$products=Product::all();
$categories=Category::limit(3)->get();
//  $user=User::where('role','=','admin')->get();



// dd($user);


    return view('frontend.index',compact('products','categories'));




}

public function CategoryProduct($id){

$products=Product::where('category_id',$id)->get();
$categories=Category::limit(3)->get();

return view('frontend.pages.categories_product',compact('products','categories'));

}

public function AddToCart(Request $request,$id){
$product=Product::findOrFail($id);
$cart=Cart::where('id',$product->id)->where('status',1)->first();
$rand=rand(111111111,999999999);
if(!session()->has('temp_user')){



session()->put('temp_user',$rand);
}
$user_id=session()->get('temp_user');



if($cart){

    $cart->increment('quantity');
    $product->decrement('quantity');
    
    
    return redirect()->back();
}
else{
$cart=Cart::create([
    'product_id' => $product->id,
    'user_id' =>$user_id, 
    
    'image' => $product->image,
  
    'price' => $product->selling_price - $product->discount_price,
    'quantity' => 1,
    'status' => 1,

]);

$product->decrement('quantity');
return redirect()->back();
}



}

public function DeleteCartProduct($id){

    Cart::findOrFail($id)->delete();

    return redirect()->back();


}
public function CartPage(){

   

    $session_id=session()->get('id');
    $temp_user=session()->get('temp_user');
    $carts=Cart::where('status',1)->where('user_id',$session_id)->orWhere('user_id',$temp_user)->get();
    // $carts=Cart::where(function ($query) {
    //     $query->where('user_id', $session_id)
    //           ->orWhere('status', '=', 1);
    // })->where(function ($query) {
    //     $query->where('stauts', '=', 1)
    //           ->orWhere('user_id', '=', $temp_user);
    // });

return view('frontend.pages.cart_page',compact('carts'));



}

public function CheckoutPage(){
    if(!session()->has('id')){
        return redirect('login')->with('error','login to checkout');
        
    }  
    $user=User::find(session('id'));
    // dd($user->id);
    $carts=Cart::where('user_id',$user->id)->where('status',1)->get();
    $user_id=session()->get('temp_user');
    if($user->role=="user"){
    
        $cart=Cart::where('user_id',$user_id)->update(['user_id'=>$user->id]);
        
        return view('frontend.pages.checkout_page',compact('user','carts'));
      }
    else{
   return redirect()->back();
}
}

public function IncrementQuantity($id){
// dd($id);
    $increment=Cart::find($id);

$cart=Cart::find($id)->increment('quantity',1);
// // $price=$cart->quantity*$cart->price;

// Cart::where('id',$id)>update(['price',]);




return redirect()->back();

}
public function UpdateCart(request $request,$id){
$cart_update=Cart::find($id);

$cart_update->quantity=$request->quantity;
$cart_update->save();
return redirect()->back();

}


public function DecrementtQuantity($id){

    Cart::find($id)->decrement('quantity',1);
        return redirect()->back();
        
    
}

// public function OrderStore(Request $request){

    
//     $quantity=0;
//     $total=0;
//     $carts=Cart::all();

//     foreach($carts as $cart){

//         $quantity+=$cart->quantity;
//         $total+=$cart->quantity*$cart->price;

//     }
  

//     // $user=User::find(session('id'));
//     // $session_id=session()->get('id');
//     // dd($session_id);
//      $user=User::find(session('id'));
//     //  dd($user->id);

//     $allcarts=Cart::where('user_id',$user->id)->get();
//     // dd($carts);
//     $request->validate([
//         'first_name' => 'required|string|max:20',
//         'last_name' => 'required|string|max:20',
//         'country' => 'required|max:30',
//         'address' => 'required|max:255',
//         'city' => 'required|max:255',
//         'state' => 'required',
//         'zip_code' => 'required|max:255',
//         'phone' => 'required|max:14',
//         'email' => 'required|max:30',

//     ]);
    


   
//                 $order=new Order;
//                 $order->first_name=$request->first_name;
//                 $order->last_name=$request->last_name;
//                 $order->email=$request->email;
//                 $order->user_id=$cart->user_id;
//                 $order->product_id=$cart->product_id;
//                 $order->country=$request->country;
//                 $order->address=$request->address;
//                 $order->city=$request->city;
//                 $order->state=$request->state;
//                 $order->zip_code=$request->zip_code;
//                 $order->phone=$request->phone;
//                 $order->quantity=$cart->quantity;
//                 $order->total_price=$cart->price*$cart->quantity;
//                 $order->save();
//                 foreach($allcarts as $cart){

//                    $order_item=new OrderItem; 
//                    $order_item->product_id=$cart->product_id;
//                    $order_item->user_id=$cart->user_id;
//                    $order_item->order_id=$order->id;
//                     $order_item->price=$cart->price;
//                    $order_item->quantity=$cart->quantity;
//                    $order_item->total_price=$cart->price*$cart->quantity;

//                    $order_item->save();


//                 }
//             Cart::where('user_id',$user->id)->delete();
//                 return redirect('/');

//             return response()->json([

               
//                 'first_name'=>$request->first_name,
//                 'last_name'=>$request->last_name,
//                 'email'=>$request->email,
//                 'user_id'=>$cart->user_id,
//                 'product_id'=>$cart->product_id,
//                 'country'=>$request->country,
//                 'address'=>$request->address,
//                 'city'=>$request->city,
//                 'state'=>$request->state,
//                 'zip_code'=>$request->zip_code,
//                 'phone'=>$request->phone,
//                 'quantity'=>$cart->quantity,
//                ' total_price'=>$cart->price*$cart->quantity,


//             ]);
            

// }

public function OrderStore(Request $request){
    $quantity = 0;
    $total = 0;
    $carts = Cart::all();

    foreach ($carts as $cart) {
        $quantity += $cart->quantity;
        $total += $cart->quantity * $cart->price;
    }

    $user = User::find(session('id'));
    $allcarts = Cart::where('user_id', $user->id)->where('status',1)->get();
    

    $request->validate([
        'first_name' => 'required|string|max:20',
        'last_name' => 'required|string|max:20',
        'country' => 'required|max:30',
        'address' => 'required|max:255',
        'city' => 'required|max:255',
        'state' => 'required',
        'zip_code' => 'required|max:255',
        'phone' => 'required|max:14',
        'email' => 'required|max:30',
    ]);

    
    $cartData = [];
    foreach ($allcarts as $cart) {
        $cartData[] =$cart->id;
            
        
     
}
$hasPendingCarts = $allcarts->contains(function ($cart) {
    return $cart->status == 1;
});


// dd($hasPendingCarts );
if($hasPendingCarts){


    $order = new Order;
    $order->first_name = $request->first_name;
    $order->last_name = $request->last_name;
    $order->email = $request->email;
    $order->user_id = $user->id;
    $order->country = $request->country;
    $order->address = $request->address;
    $order->city = $request->city;
    $order->state = $request->state;
    $order->zip_code = $request->zip_code;
    $order->phone = $request->phone;
    $order->quantity =0;
    $order->total_price = $total;
    $order->cart_id = json_encode($cartData);
    $order->save();
    $cart=Cart::where('user_id', $user->id)->update(['status'=>2]);



    return redirect('/frontend/invoice');
}
else{

    return redirect('/');


}
}

public function FrontendAllOrders(){
    $orders =Order::all();

return view('frontend.pages.all_orders',compact('orders'));

}
public function UserAccount(){
    //$user = User::find(session('role'));
    $user=session()->get('id');
// dd($user);
    $session_user=user::where('id',$user)->first();
    // dd($session_id);

    $orders=Order::where('user_id',$user)->get();
    //dd($orders);

return view('frontend.pages.user_dashboard',compact('orders','session_user'));


}
public function FrontendInvoice($id){

    $data=Order::find($id);
   $ids=json_decode($data->cart_id);

if(count($ids)>0){
$arr=[];
foreach($ids as $cartId){
$cartData=Cart::find($cartId);
// DD($cartData);
if($cartData){

$product=$cartData->product;
if($product){
$arr[]=array(

    'cart_id' => $cartData->id,
    'quantity' => $cartData->quantity,
    'price' => $cartData->price,
    'product_name' => $product->name,

);


}


}


}


}
$allCarts = Cart::whereIn('id', $ids)->sum('price');

$tax=$allCarts*0.25;
 $totalPrice=$allCarts+$tax;
   
return view('frontend.pages.invoice',compact('allCarts','arr','data','tax','totalPrice'));




}

public function UpdateUserProfile(Request $request){

$user_id=$request->id;

User::find($user_id)->update([
'last_name'=>$request->last_name,
'phone'=>$request->phone,
'address'=>$request->address,


]);

return redirect()->back();


}


}
