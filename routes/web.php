<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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





Route::get('/register', function () {
    return view('Home.Register');
});

Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/authenticate',[LoginController::class,'Authenticate'])->name('Authenticate');
Route::post('/register',[LoginController::class,'register'])->name('Register');
Route::get('/logout',[LoginController::class,'logout'])->name('Logout');

// ->middleware('CheckRole')

Route::controller(App\Http\Controllers\OrderController::class)->group(function(){
    Route::get('/Order', 'index')->name('ListOrder')->middleware('auth');
    Route::get('/Order/{id?}', 'Detail')->name('OrderDetail');
    Route::Post('/Order/Update/{id?}', 'Update')->name('OrderUpdate');
    Route::get('/welcome', 'HotSale')->name('HotSale');  

});



Route::controller(App\Http\Controllers\CartController::class)->group(function(){
    Route::get('/AddCart/{id?}', 'addToCart')->name('AddToCart');
    Route::get('/Cart','viewCart')->name('ViewCart');
    Route::get('/Cart/Remove/{id?}','removeItem')->name('RemoveItem');
    Route::get('/Cart/Increase/{id?}','IncreaseQuantity')->name('Increase');
    Route::get('/Cart/Decrease/{id?}','DecreaseQuantity')->name('Decrease');
    Route::post('/Check','PlayOrder')->name('PlayOrder');
 
      
});


Route::controller(App\Http\Controllers\HomeController::class)->group(function(){
    Route::get('/Home', 'Index')->name('Home');
    Route::get('/Detail/{id?}','Detail_product')->name('Detail');
    Route::get('/Store','Get_All')->name('Store');
    Route::get('/Store_paging','Get_Product_Paging')->name('Get_Product_Paging');
    Route::get('/Store_sorting','Get_Product_Sorting')->name('Get_Product_Sorting');
    Route::get('/Store_cate/{id?}','Get_Product_By_Category')->name('Get_Product_By_Category');

    Route::get('/Email', 'View_Mail')->name('View_mail');
    Route::post('/Send_Email', 'Send_Mail')->name('Mail');

});

Route::controller(App\Http\Controllers\BrandsController::class)->group(function(){
    Route::get('/Admin/Brand/List','Index')->name('Admin.Brands.List');
    Route::get('/Admin/Brand/Create','create')->name('Admin.Brands.Create');
    Route::post('/Admin/Brand/Store','store')->name('Admin.Brands.Store');
    Route::get('/Admin/Brand/Edit/{id?}','edit')->name('Admin.Brands.Edit');
    Route::post('/Admin/Brand/Update/{id?}','update')->name('Admin.Brands.Update');
    Route::get('/Admin/Brand/Delete/{id?}','Delete')->name('Admin.Brands.Delete'); 
});


Route::controller(App\Http\Controllers\CategoriesController::class)->group(function(){
    Route::get('/Admin/Categories/List','Index')->name('Admin.Categories.List');
    Route::get('/Admin/Categories/Create','Create')->name('Admin.Categories.Create');
    Route::post('/Admin/Categories/Store','Store')->name('Admin.Categories.Store');
    Route::get('/Admin/Categories/Edit/{id?}','Edit')->name('Admin.Categories.Edit');
    Route::Post('/Admin/Categories/Update/{id?}','Update')->name('Admin.Categories.Update');
    Route::get('/Admin/Categories/Delete/{id?}','Delete')->name('Admin.Categories.Delete'); 
});


Route::controller(App\Http\Controllers\ProductsController::class)->group(function(){
    Route::get('/Admin/Products/List','Index')->name('Admin.Products.List');
    Route::get('/Admin/Products/Create','Create')->name('Admin.Products.Create');
    Route::post('/Admin/Products/Store','Store')->name('Admin.Products.Store');
    Route::get('/Admin/Products/Edit/{id?}','Edit')->name('Admin.Products.Edit');
    Route::Post('/Admin/Products/Update/{id?}','Update')->name('Admin.Products.Update');
    Route::get('/Admin/Products/Delete/{id?}','Delete')->name('Admin.Products.Delete'); 
});





