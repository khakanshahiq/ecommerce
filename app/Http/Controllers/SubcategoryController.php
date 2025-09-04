<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;


class SubcategoryController extends Controller
{
    
public function AllSubCategory(){
    $user=User::find(session('id'));
    // dd($user);


if($user->role=="admin"){
    
    $subCategories=Subcategory::latest()->get();  


    return view('admin.subcategory.all_sub_categories',compact('subCategories'));
}
else{

    return redirect()->back();
}


}
public function AddSubcategory(){
    $categories=Category::latest()->get();  

    return view('admin.subcategory.add_sub_category',compact('categories'));
    
    
       } 

       public function AddCategory(){

        return view('admin.category.add_category');
        
        
           } 
        public function StoreSubcategory(Request $request){
        
            $request->validate([
                'name'=>'required|unique:subcategories',
                'category_id'=>'required',

                
                ]);
        
        
        
        
        
    
        
        Subcategory::insert([
        
        'name'=>$request->name,
        'category_id'=>$request->category_id,

        
        
        ]);
        
        
        
        return redirect()->route('all.subcategory')->with('success','category inserted successfully');
        
        }

        public function EditSubcategory($id){
    $categories=Category::latest()->get();  
try{
    $subCategoryData=Subcategory::find($id);
    return view('admin.subcategory.edit_sub_category',compact('categories','subCategoryData'));



}catch(ModelNotFoundException $e){

return redirect()->back();

}

}

        public function UpdateSubcategory(Request $request){

            $subcategory_id=$request->id;

            $request->validate([
                'name'=>'required',
                'category_id'=>'required',

                
                ]);
        
        
        
        
        
    
        
        Subcategory::findOrFail($subcategory_id)->update([
        
        'name'=>$request->name,
        'category_id'=>$request->category_id,

        
        
        ]);
        
        
        
        return redirect()->route('all.subcategory')->with('success','category inserted successfully');


        }


        public function DeleteSubcategory($id){
            $subcategory= Subcategory::findOrFail($id);
            foreach ($subcategory->products as $subcategory) {
                $subcategory->sucategory()->dissociate();
                $subcategory->save();
               
              
           }
           $subcategory= Subcategory::findOrFail($id)->delete();
       
         
            return redirect()->route('all.subcategory')->with('success','category inserted successfully');


        }

       
}
