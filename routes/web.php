<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomauthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\CustomerController;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/register',[CustomauthController::class,'register'])->name('register');
Route::get('/login',[CustomauthController::class,'login'])->name('login');

Route::post('/register-user',[CustomauthController::class,'RegisterUser'])->name('register-user');

Route::post('/login-user',[CustomauthController::class,'LoginUser'])->name('login-user');


Route::get('/logout',[CustomauthController::class,'Logout'])->name('logout');


Route::get('/',[FrontendController::class,'index'])->name('index');
Route::post('/order/store',[FrontendController::class,'OrderStore'])->name('order.store');
Route::post('/update/cart/{id}',[FrontendController::class,'UpdateCart'])->name('update.cart');



Route::controller(FrontendController::class)->group(function(){

    Route::get('/category/product/{id}','CategoryProduct')->name('category.product');
    Route::get('/add/cart/{id}','AddToCart')->name('add-to.cart');
    Route::get('/cart/page','CartPage')->name('cart.page');
    Route::get('/delete/cart/produt/{id}','DeleteCartProduct')->name('delete.cart.product');

    Route::get('/checkout/page','CheckoutPage')->name('checkout.page');
    Route::get('/user/account','UserAccount')->name('user.account');
    Route::get('/all/frontend/order','FrontendAllOrders')->name('frontend.all.orders');
    Route::post('/update/user/profile','UpdateUserProfile')->name('update.user.profile');



    Route::get('/frontend/invoice/{id}','FrontendInvoice')->name('frontend.incoice');

    Route::get('/increment/quantity/{id}','IncrementQuantity')->name('increment.quantity');
    Route::get('/decrement/quantity/{id}','DecrementtQuantity')->name('decrement.quantity');
        });




Route::middleware(['CheckSession'])->group(function () {
Route::get('/dashboard',[CustomauthController::class,'Dashboard'])->name('dashboard');

   
    Route::controller(ProfileController::class)->group(function(){

        Route::get('/view/profile','ViewProfile')->name('profile.view');
        Route::post('/update/profile','UpdateProfile')->name('update.profile');
        Route::get('/change/password','ChangePassword')->name('change.password');
        Route::post('/update/password','UpdatePassword')->name('update.password');
});
    Route::controller(CategoryController::class)->group(function(){

        Route::get('/allcategory','AllCategory')->name('all.category')->middleware('CheckSession');
        Route::get('/addcategory','AddCategory')->name('add.category');
        Route::post('/storecategory','StoreCategory')->name('store.category');
        Route::get('/Editcategory/{id}','EditCategory')->name('edit.category');
        Route::post('/updatecategory','UpdateCategory')->name('update.category');
        
        Route::get('/deletecategory/{id}','DeleteCategory')->name('delete.category');
        
        });

        Route::controller(SubcategoryController::class)->group(function(){

            Route::get('/allsubcategory','AllSubCategory')->name('all.subcategory');
            Route::get('/addscategory','AddSubcategory')->name('add.subcategory');
            Route::post('/storesubcategory','StoreSubcategory')->name('store.subcategory');
            Route::get('/Editsubcategory/{id}','EditSubcategory')->name('edit.subcategory');
            Route::post('/updatesubcategory','UpdateSubcategory')->name('update.subcategory');
            
         Route::get('/deletesubcategory/{id}','DeleteSubcategory')->name('delete.subcategory');
            
            });
        
            Route::controller(ProductController::class)->group(function(){
        
                Route::get('/allproduct','AllProduct')->name('all.product');
                Route::get('/addproduct','AddProduct')->name('add.product');
                Route::post('/storeproduct','StoreProduct')->name('store.product');
                Route::get('/Editproduct/{id}','EditProduct')->name('edit.product');
                Route::post('/updateproduct','UpdateProduct')->name('update.product');
                Route::get('/showproduct/{id}','ShowProduct')->name('show.product');
        
                
             Route::get('/deleteproduct/{id}','DeleteProduct')->name('delete.product');
                
                });

                Route::controller(OrderController::class)->group(function(){
        
                    Route::get('/allorders','AllOrders')->name('all.orders');
                    Route::get('/delivered/orders/{id}','DeliveredOrders')->name('delivered.orders');
                    Route::get('/orderdetail/{id}','OrderDetail')->name('order.detail');
                    Route::get('/demo','Demo')->name('demo');
                    Route::get('/generate-invoice/{id}', 'generateInvoice')->name('invoice');



                  
                    
                    });
                    Route::controller(CustomerController::class)->group(function(){
        
                        Route::get('/allcustomer','AllCustomer')->name('all.customer');
                       // Route::get('/delivered/orders/{id}','DeliveredOrders')->name('delivered.orders');
    
                      
                        
                        });           


});



        
    
    





