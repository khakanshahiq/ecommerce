<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;


class ProductController extends Controller
{
    
public function AllProduct(){
    $user=User::find(session('id'));
    // dd($user);


if($user->role=="admin"){


   
$products=Product::latest()->get();
return view('admin.product.all_product',compact('products'));
}
else{

    return redirect()->back();
}


}
public function AddProduct(){

$categories=Category::all();
$subcategories=Subcategory::all();

return view('admin.product.add_product',compact('categories','subcategories'));

}
public function StoreProduct(Request $request){


$request->validate([
    'category_id' => 'required|exists:categories,id',
    'sub_category_id' => 'required|exists:subcategories,id',
    'name' => 'required|string|min:4|max:255',
    'description' => 'required|string',
    'quantity' => 'required',
    'selling_price' => 'required',
    'discount_price' => 'required',

    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);


$file=$request->file('image');
$fileName=date('ymdHi').$file->getClientOriginalName();
$file->move(public_path('upload/product_image'),$fileName);
$data['image']=$fileName;

Product::insert([
'name'=>$request->name,
'description'=>$request->description,
'image'=>$fileName,
'category_id'=>$request->category_id,
'sub_category_id'=>$request->sub_category_id,
'quantity'=>$request->quantity,
'selling_price'=>$request->selling_price,
'discount_price'=>$request->discount_price,
]);



return redirect()->route('all.product')->with('success','product created successfully');

}

public function EditProduct($id){
    $categories=Category::all();
    $subcategories=Subcategory::all();
$editProduct=Product::find($id);
if(!$editProduct){
    return redirect()->back()->with('error', 'Category not found');


}
return view('admin.product.edit_product',compact('editProduct','categories','subcategories'));


}

public function UpdateProduct(Request $request){

    $product_id=$request->id;
    //$old_image=$request->old_image;
    
         if($request->file('image')){
    
    
            
            $data=Product::find($product_id);
            $data->name=$request->name;
            $data->description=$request->description;
            

            
           
               $file=$request->file('image');
               @unlink(public_path('upload/product_image/'.$data->image));
               $fileName=date('ymdHi').$file->getClientOriginalName();
               $file->move(public_path('upload/product_image'),$fileName);
               $data['image']=$fileName; 
            
            
           
            $data->category_id=$request->category_id;
            $data->sub_category_id=$request->sub_category_id;

            $data->save();
    
    
       
               
                    return redirect()->route('all.product')->with('success','product updated with image successfully');
    
         
         
         }
         else{
    
            Product::findOrFail($product_id)->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'category_id'=>$request->category_id,
                'sub_category_id'=>$request->sub_category_id,
               
              
                
                
                ]);
                
                // Brand::create($input);
               
                    return redirect()->route('all.product')->with('success','product updated withour image successfully');
    
    
         }

}


public function ShowProduct($id){
    // Find the product with the given ID
    $product = Product::findOrFail($id);

    // Pass the product data to the view
    return view('admin.product.show_product', compact('product'));
}



public function DeleteProduct($id){

    $product=Product::findOrFail($id);
    @unlink(public_path('upload/product_image/'.$data->image));
    Product::findOrFail($id)->delete();
    return redirect()->route('all.product')->with('success','product deleted successfully');


}
}