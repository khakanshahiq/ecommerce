<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Hash;
use Illuminate\Validation\Rules\Password;
use App\Rules\PasswordComplexityRule;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;



class CustomauthController extends Controller
{
    
public function register(){
if(session()->has('id')){
return redirect()->back();

}
return view('auth.register');

}
public function login(){

    
    if(session()->has('id')){
        return redirect()->back();
        
        }
        
       
        
    return view('auth.login');
   
    
    }
    
   

    public function RegisterUser(Request $request){


                $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:users',
             
                
            ]);

            $validator = Validator::make($request->all(), [
                'password' => ['required', 'confirmed', new PasswordComplexityRule],
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
                $user=new User;
                $user->name=$request->name;
                $user->email=$request->email;
                $user->password=Hash::make($request->password);
                $user->role='user';
                if($user->save()){

                return redirect('login')->with('success','user registed successfully');
            }
            else{

                return redirect('register')->with('error','user not registed successfully');  
            }


                }
   public function LoginUser(Request $request) {

            $request->validate([

'email'=>'required|email',
'password'=>'required',
 ]);


$user = User::where('email', $request->email)->first();

if ($user && Hash::check($request->password, $user->password)) {
    
    session()->put('id', $user->id);
    session()->put('role', $user->role);
    // $role=session()->get('role', $user->role);

    // dd($role);
    $temp_user=session()->get('temp_user');
    

   Cart::where('user_id',$temp_user)->update(
    [
        'user_id'=>$user->id
    ]
   );

    if($user->role=='admin'){


   

    return redirect('dashboard');
}
elseif($user->role=='user'){

    return redirect('/');
}

}

else{

return redirect('login')->with('error','email and password is incorrect');

}



   }
public function Dashboard(Request $request){


if (!session()->has('id')) {
    return redirect('login')->with('error', 'Login to view dashboard');
}

// Retrieve the user from the database based on the session ID
$user = User::find(session('id'));
//dd($user);

// Check the user's role
if ($user->role == 'admin') {
    return view('admin.index');
} 
// elseif (!$user->role == 'admin') {
   
// } 
else {
    
    //return redirect('login')->with('error', 'Invalid user role');
    return redirect()->back();
}


}

public function Logout(){
    session()->forget('role');

 return redirect('login');
    
    }

}
