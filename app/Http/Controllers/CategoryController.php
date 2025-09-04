<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{

  

        
    public function AllCategory(){
        $user=User::find(session('id'));
      

// if(!session()->has('role'=='admin')){



//     return redirect()->back();

     
    
// }
$categories=Category::latest()->get();  

return view('admin.category.all_categories',compact('categories'));

}

    


   public function AddCategory(){
  
return view('admin.category.add_category');
}

public function StoreCategory(Request $request){
   

    $request->validate([
        'name' => 'required|unique:categories',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);




$file=$request->file('image');
$fileName=date('ymdHi').$file->getClientOriginalName();
$file->move(public_path('upload/category_image'),$fileName);
$data['image']=$fileName;


Category::insert([

'name'=>$request->name,
'image'=>$fileName,



]);



return redirect()->route('all.category')->with('success','category inserted successfully');
}


public function EditCategory($id){

$categoryData = Category::find($id);

    
    if (!$categoryData) {
        return redirect()->back()->with('error', 'Category not found');
    }

  
    return view('admin.category.edit_category', compact('categoryData'));


}

public function UpdateCategory(Request $request){
   
    $category_id=$request->id;
    //$old_image=$request->old_image;
    
         if($request->file('image')){
    
    
            
            $data=Category::find($category_id);
            $data->name=$request->name;
            
            if($request->file('image')){
               $file=$request->file('image');
               @unlink(public_path('upload/category_image/'.$data->image));
               $fileName=date('ymdHi').$file->getClientOriginalName();
               $file->move(public_path('upload/category_image'),$fileName);
               $data['image']=$fileName; 
            
            
            }
            $data->save();
    
    
       
               
                    return redirect()->route('all.category');
    
         
         
         }
         else{
    
            Category::findOrFail($category_id)->update([
                'name'=>$request->name,
               
              
                
                
                ]);
                
                // Brand::create($input);
               
                    return redirect()->route('all.category');
    
    
         }
       
}
public function DeleteCategory($id){

   


$category=Category::FindOrFail($id);

 
    foreach ($category->subcategories as $subcategory) {
         $subcategory->category()->dissociate();
         $subcategory->save();
        
       
    }

  



foreach($category->products as $cat){

    $cat->category()->dissociate();
    $cat->save();
    
    }
@unlink(public_path('upload/category_image/'.$data->image));
Category::findOrFail($id)->delete();
return redirect()->back()->with('success','category deleted successfully');



}

}
