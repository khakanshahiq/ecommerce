<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\user;
use App\Models\Cart;
use App\Models\Orderitem;
use DB;
use PDF;




class OrderController extends Controller
{
    
public function AllOrders(){
    
$orders=Order::all();
return view('admin.orders.all_orders',compact('orders'));


}

public function DeliveredOrders($id){


$paid_order=Order::find($id)->update(['status'=>'paid']);
return redirect()->back();

}



public function OrderDetail($id) {
    $data = Order::find($id);
    
    $ids = json_decode($data->cart_id);

    if (count($ids) > 0) {
        $arr = [];

        foreach ($ids as $cartId) {
            $cartData = Cart::find($cartId);
            if ($cartData) {
                $product = $cartData->product;
                 if ($product) {
                    $arr[] = array(
                        'cart_id' => $cartData->id,
                        'quantity' => $cartData->quantity,
                        'price' => $cartData->price,
                        'product_name' => $product->name,
                        
                        
                    );
                 
                  
                    
                } 

               
            } 
            
            else {
               dd('there is no order');
            }
        }
$userData = Order::find($id);
$allCarts = Cart::whereIn('id', $ids)->get();
// $allCarts = Cart::whereIn('id', $ids)->sum('price');
// dd($allCarts);


$subtotal=0;


foreach ($allCarts as $cart) {
    $subtotal += $cart->price * $cart->quantity;
    
}


$tax=0.25*$subtotal;


$totalAmount=$tax+$subtotal;


 return view('admin.orders.order_detail',compact('arr','userData','subtotal','tax','totalAmount'));
    } else {
        return response()->json([
            'status' => 0,
            'message' => 'No cart items found for this order'
        ]);
    }
}

// public function DownloadInvoice($id){
    
//     // dd($request->input('id'));
    
//     $data = Order::find($id);

//     $ids = json_decode($data->cart_id);

//     if (count($ids) > 0) {
//         $arr = [];
//         $subtotal = 0;

//         foreach ($ids as $cartId) {
//             $cartData = Cart::find($cartId);

//             if ($cartData) {
//                 $product = $cartData->product;

//                 if ($product) {
//                     $arr[] = array(
//                         'cart_id' => $cartData->id,
//                         'quantity' => $cartData->quantity,
//                         'price' => $cartData->price,
//                         'product_name' => $product->name,
//                     );

//                     // Accumulate the subtotal for each cart item
//                     $subtotal += $cartData->price * $cartData->quantity;
//                 }
//             } else {
//                 dd('There is no order');
//             }
//         }
//         $userData = Order::find($id);
//         // Retrieve all carts associated with the order
//         $allCarts = Cart::whereIn('id', $ids)->get();

//         // Calculate the subtotal for all carts
//         foreach ($allCarts as $cart) {
//             $subtotal += $cart->price * $cart->quantity;
//         }

//         // Calculate tax (assuming tax is 25% of subtotal)
//         $tax = 0.25 * $subtotal;

//         // Calculate total amount
//         $totalAmount = $tax + $subtotal;

//         // Pass the necessary data to the invoice view
//         $pdf = PDF::loadView('admin.orders.invoice', compact('arr', 'userData', 'subtotal', 'tax', 'totalAmount'));

//         // Download the PDF
//         return $pdf->download('invoice.pdf');
//     } else {
//         return response()->json([
//             'status' => 0,
//             'message' => 'No cart items found for this order'
//         ]);
//     }
    
// }





public function generateInvoice($id) {
    $data = Order::find($id);

    $pdf = PDF::loadView('admin.orders.invoice', $data);
    return $pdf->download('pdf.pdf');

       
    
}

public function Demo(){

$data=[
'demo'=>'this is demo data',

];
$pdf=PDF::loadview('admin.orders.demo',$data);
return $pdf->download('demo.pdf');


}

}
