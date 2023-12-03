<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admincontroller;
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
//     return view('user.home');
// });
Route::get('/',[Homecontroller::class,'index']);



Route::get('/Logout',[Homecontroller::class,'logout_admin'])->name('logout_admin');

Route::get('/redirect',[Homecontroller::class,'redirect'])->name('redirect');

Route::get('/users',[Admincontroller::class,'user'])->name('users');


Route::post('/Register_User',[Admincontroller::class,'add_user'])->name('add.user');

Route::get('/product',[Admincontroller::class,'add_product']);

Route::post('/Add_product',[Admincontroller::class,'upload_product'])->name('upload.product');

Route::get('/All_Product_Admin',[Admincontroller::class,'all_product'])->name('all.product');

Route::get('/Edit_Product/{id}',[Admincontroller::class,'edit_product'])->name('edit.product');

Route::post('/Update_Product/{id}',[Admincontroller::class,'update_product'])->name('update.product');

Route::get('/Delete/{id}',[Admincontroller::class,'delete_product'])->name('delete.product');

Route::get('/All_Orders',[Admincontroller::class,'all_order'])->name('all.order');

Route::get('/Baner',[Admincontroller::class,'baner'])->name('baner');

Route::get('/Header',[Admincontroller::class,'header'])->name('header');

Route::post('/Upload_Header',[Admincontroller::class,'upload_header'])->name('upload.header');


Route::get('/Delete_Baner/{id}',[Admincontroller::class,'delete_baner'])->name('delete.baner');

Route::post('/Upload_Baner_Item',[Admincontroller::class,'upload_baner'])->name('upload.baner');

Route::get('/Search',[Homecontroller::class,'search'])->name('search');


Route::get('/About_Us',[Homecontroller::class,'about'])->name('about');


Route::get('/About_Panel',[Admincontroller::class,'about_us'])->name('about.us');


Route::post('/Upload_footer',[Admincontroller::class,'upload_footer'])->name('upload.footer');


Route::get('/Team_Member_Panel',[Admincontroller::class,'team_member'])->name('team.member');

Route::post('/Upload_About',[Admincontroller::class,'upload_about'])->name('upload.about');

Route::post('/Upload_team_Mmber',[Admincontroller::class,'upload_team_member'])->name('upload.team_member');

Route::get('/Partners_Panel',[Admincontroller::class,'partner'])->name('partner');

Route::post('/Upload_Partner',[Admincontroller::class,'upload_partner'])->name('upload.partner');

Route::get('/delete_partner/{id}',[Admincontroller::class,'delete_partner'])->name('delete.partner');

Route::get('/Footer_Panel',[Admincontroller::class,'footer'])->name('footer');





Route::post('/Add_Cart/{id}',[Homecontroller::class,'add_cart'])->name('add.cart');

Route::get("/View_Cart/{id}", [HomeController::class,"view_cart"])->name("view.cart");

Route::post("/Order_Products", [HomeController::class,"placeorder"])->name("order.product");

Route::get("/All_Products", [HomeController::class,"view_all_product"])->name("view.all.product");


Route::get("/View_Order/{id}", [HomeController::class,"view_order"])->name("view.order");

Route::post("/Cancel_Order/{oid}", [HomeController::class,"cancel_order"])->name("cancel.order");

Route::get("/Delete_Cart/{cid}", [HomeController::class,"delete_cart"])->name("delete.cart");



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
