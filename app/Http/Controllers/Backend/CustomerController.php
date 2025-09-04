<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class CustomerController extends Controller
{
    
public function AllCustomer(){

$customers=Order::all();
return view('admin.customers.all_customers',compact('customers'));


}



}
