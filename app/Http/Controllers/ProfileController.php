<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Rules\PasswordComplexityRule;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    
public function ViewProfile(){

   $id=session()->has('id');
 
   $user=User::find(session('id'));
   // dd($user);


if($user->role=="admin"){
$profileData=User::find($id); 
// dd($profileData);


return view('admin.view_profile',compact('profileData'));
}
else{

    return redirect()->back();
}

}

public function UpdateProfile(Request $request){
    $id=session()->has('id');
    $data=User::find($id);
    $data->name=$request->name;
    $data->email=$request->email; 
    $data->phone=$request->phone; 
    $data->address=$request->address; 
    if($request->file('image')){
      $file=$request->file('image');
      @unlink(public_path('upload/profile_image/').$data->image);
      $fileName=date('YmdHi').$file->getClientOriginalName();
      $file->move(public_path('upload/profile_image'),$fileName);
      $data['image']=$fileName;


    }
    $data->save();
    return redirect()->back();


}
public function ChangePassword(){

$id=session()->has('id');
$profilePassword=user::find($id);
return view('admin.change_password',compact('profilePassword'));


}


public function updatePassword(Request $request)
{
    $request->validate([
        'old_password' => 'required',
        //'new_password' => 'required|confirmed',
        'new_password' => [
          'required',
          'different:old_password', 
          'confirmed',
          new PasswordComplexityRule
      ],
    ]);
    // $validator = Validator::make($request->all(), [
    //     'old_password' => 'required',
    //     'password' => ['required', 'confirmed', new PasswordComplexityRule],
    // ]);

    $userId = session('id');

    // Retrieve the user by ID
    $user = User::find($userId);

    if (!$user || !Hash::check($request->old_password, $user->password)) {
        return redirect()->back()->with('error', 'Old password does not match');
    }

    $user->update([
        'password' => Hash::make($request->new_password),
    ]);

    return redirect()->back()->with('success', 'Password updated successfully');
}


}
