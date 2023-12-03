<?php

namespace App\Http\Controllers;


use App\Models\About;
use App\Models\Baner;
use App\Models\Cart;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Team;
use Illuminate\Http\Request;
use \App\Models\User;

use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;

class Homecontroller extends Controller
{
    public function index(){

        if(Auth::id()){
            return redirect('redirect');
        }else{
            $products = product::paginate(6);
            $baner = Baner::all();
            $logo = Header::all();
            $about = About::all();
            $footer = Footer::all();
            return view('user.home',compact('products','baner','logo','about','footer'));
        }
     
    }
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype =='1'){
            return view('admin.home');
        }else{
            $products = product::paginate(6);
            $user_id = Auth::id();
            $count = cart::where('user_id',$user_id)->count();
            $order = order::where('user_name' , $user_id)->count();
            $baner = Baner::all();
            $logo = Header::all();
            $about = About::all();
            $footer = Footer::all();
            return view('user.home',compact('products','count','order','baner','logo','about','footer'));
        }
    } 
     public function logout_admin()
    {
    Auth::logout();

    // You can perform additional tasks after logout if needed

    return redirect('/'); // Redirect to the desired page after logout
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $user_id = Auth::id();
        $count = cart::where('user_id',$user_id)->count();
        $logo = Header::all();
        $baner = Baner::all();
        $products = product::where('title' , 'Like' , '%' . $search . '%')->get();
        $footer = Footer::all();
        return view('user.view_all_product', compact('products' , 'count','baner','logo','footer'));
    }
    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user_id = Auth::id();
            $product_id = $id;
            $quantity = $request->quantity;
            $product = Product::find($product_id);
            $price = $product->price;
            $total = $quantity * $price;
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->product_id = $product_id;
            $cart->quantity = $quantity;
            $cart->total = $total;
            $cart->save();
            return redirect()->back()->with('add_cart', 'Item has been added to Your Cart .');
        }else{
            return redirect('/login');
        }
    }
    public function view_cart(Request $request,$id){       
        $count = cart::where('user_id',$id)->count();

        if ($count > 0) {
            $info  = cart::where('user_id', $id)->join('users', 'carts.user_id', '=', 'users.id')->get();
            $data  = cart::where('user_id', $id)->join('products', 'carts.product_id', '=', 'products.id')->get();
            $total = cart::sum('total');
            $logo = product::all();
            $header = Header::all();
            $footer = Footer::all();
            return view('user.show_cart', compact('count', 'data', 'info', 'total','logo','header','footer'));
        } else {
         
           
            // Redirect or show a message if the cart is empty
            return redirect()->route('redirect')->with('nocart', 'No items In Your Cart found.'); // Adjust the route name as needed
        }
    }
    public function placeorder(Request $request){
        $userId = Auth::id();
        foreach($request->product_name as $key => $product_name) {
            $data = new Order;          
            $data->product_name     = $product_name;
            $data->product_price    = $request->product_price[$key];
            $data->product_quantity = $request->product_quantity[$key];
            $data->user_name     = $request->user_name;
            $data->user_phone    = $request->user_phone;
            $data->user_email    = $request->user_email;
            $data->user_address  = $request->user_address;
            $data->payment_method= $request->payment_method;
            $data->total_amount  = $request->total_amount[$key];
            $data->save();
            Cart::where('user_id', $userId)->delete(); 
        }
        // Cart::where('user_id', $userId)->delete(); 
   
        return redirect()->route('redirect')->with('success_order', 'Order placed successfully!');
    }    
    public function view_order(Request $request ,$id){
        $data = Order::where('user_email' , Auth::user()->email)->with('product')->get();
        $footer = Footer::all();    
        $logo = product::all();
        $header = Header::all();
        return view('user.view_order', compact('data','footer','logo','header'));
       
    }
    public function cancel_order(Request $request,$oid){

       Order::where('oid', $oid)->update(['status' => 'canceled', 'canceled_at' => now()]);
        return redirect()->back()->with('order_cancel', 'Order canceled successfully.');
    }

    public function delete_cart($cid){
        $data =   cart::where('cid',$cid);
        $data->delete();
        return redirect()->back()->with('delete_cart', 'Cart Item Deleted Successfully!');
    }

    public function view_all_product(){
        
            $products = product::paginate(15);
            $user_id = Auth::id();
            $count = cart::where('user_id',$user_id)->count();
            $order = order::where('user_name' , $user_id)->count();
            $baner = Baner::all();
            $logo = Header::all();
            $footer = Footer::all();
            return view('user.view_all_product',compact('products','count','order','baner','logo','footer'));
        
    }
    public function about(){
        
        $products = product::paginate(15);
        $user_id = Auth::id();
        $count = cart::where('user_id',$user_id)->count();
        $order = order::where('user_name' , $user_id)->count();
        $baner = Baner::all();
        $header = Header::all();
        $about = About::all();
        $team = Team::all();
        $partner = Partner::all();
        $footer = Footer::all();
        return view('user.about',compact('products','count','order','baner','header','about','team','partner','footer'));
       
}
  
}

