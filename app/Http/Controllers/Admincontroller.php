<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Baner;
use App\Models\Header;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Team;
use App\Models\Footer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Admincontroller extends Controller
{
    public function add_product(){
        return view('admin.add_product');
    }
    public function all_order(){
        $data  = Order::with('product')->get();
        return view('admin.all_order' , compact('data'));
      }
      public function baner(){
        $baner = Baner::all();
        return view('admin.baner' , ['data' => $baner]);
    } public function header(){
        $baner = Header::all();
        return view('admin.header' , ['data' => $baner]);
    }
    public function about_us(){
        $about = About::all();
        return view('admin.about' , ['data' => $about]);
    }
    public function team_member(){
        $team = Team::all();
        return view('admin.team_member' , ['data' => $team]);
    }
    public function partner(){
        $team = Partner::all();
        return view('admin.partner' , ['data' => $team]);
    }
    public function footer(){
        $team = Footer::all();
        return view('admin.footer' , ['data' => $team]);
    }
    public function all_product(){
        $data = product::all();
        return view('admin.all_product' , compact('data'));
    }
    public function upload_product(request $request){
        $data = new Product;
        
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);
        $data->image = $imagename;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price; 

        $data->save();    
        return redirect()->back()->with('add_product', 'Product Uploaded Succesfully');
    }
    public function edit_product($id){
        $product = DB::table('products')->find($id);
        return view('admin.edit_product' , ['data' => $product]);
    }

    public function delete_product( $id){
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        // Delete the product image from the folder
        $imagePath = public_path('productimage/' . $product->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        // Delete the product from the database
        $product->delete();

        return redirect()->back()->with('delete_product', 'Product deleted successfully');
    }

    public function update_product(request $request,$id){   
        $data = Product::find($id);

            $image = $request->image;
            if($image){
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move('productimage', $imagename);
                $data->image = $imagename;
            }
            $data->title = $request->title;
            $data->price =  $request->price;
            $data->description = $request->description;

            $data->save();
    
           if($data){
                return redirect()->route('all.product')->with('Product_Update','Product  Updated');
              }else{
                echo "<h1>Data Not Updated</h1>";
            }     
      }


    public function upload_baner(Request $request){
        $data = new Baner;
        
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('banerimage', $imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->desc = $request->desc;
        
        $data->save();    
        return redirect()->back()->with('add_baner', 'Baner Item  Uploaded Succesfully');
    }
    public function delete_baner($id){
        $baner = Baner::find($id);

        $baner->delete();

        return redirect()->back()->with('delete_baner', 'Baner Item  Deleted Succesfully');
    }
   
    public function upload_header(Request $request){
        $data = new Header;

        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('logoimage', $imagename);
        $data->image = $imagename;

        $data->logo_title = $request->logo_title;
        $data->save();  

        return redirect()->back()->with('add_logo', 'Logo   Uploaded Succesfully');
    }

    public function upload_about(Request $request){
       
        $data = new About;

        $image1 = $request->file('header_image');     
        $imagename1 = time() . '.' . $image1->getClientOriginalExtension();
        $request->header_image->move('headerimage', $imagename1);
        $data->header_image = $imagename1;

        $image2 = $request->file('back_image');
        $imagename2 = time() . '.' . $image2->getClientOriginalExtension();
        $request->back_image->move('backgroundimage', $imagename2);
        $data->back_image = $imagename2;


        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->facebook = $request->facebook;
        $data->youtube = $request->youtube;

        $data->save();    
        return redirect()->back()->with('add_about', 'About  Added  Succesfully');
        
    }
 
    public function upload_team_member(Request $request){
        $data = new Team;

        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('teamimage', $imagename);
        $data->image = $imagename;

        $data->name = $request->name;
        $data->position = $request->position;
        $data->description = $request->description;
        $data->facebook = $request->facebook;

        $data->save();    
        return redirect()->back()->with('add_team', 'Team Member Uploaded Succesfully');
    }
 
    public function upload_partner(Request $request){
        $data = new Partner;
        
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('partnerimage', $imagename);
        $data->image = $imagename;

        $data->name = $request->name;
        $data->facebook = $request->facebook;

        $data->save();    
        return redirect()->back()->with('add_partner', 'Partner Info Uploaded Succesfully');
    }

    public function delete_partner($id){
        $data = Partner::find($id);

        $data->delete();
        return redirect()->back()->with('delete_partner', 'Partner  Deleted Succesfully');
    }
    
    public function upload_footer(Request $request){
        $data = new Footer;
       
        $data->name = $request->name;
        $data->design = $request->design;
       
        $data->save();    
        return redirect()->back()->with('add_footer', 'Footer  Uploaded Succesfully');
    }

    public function user(){
        $data = User::all();

        return view("admin.user" , compact('data'));
    }

    public function add_user(Request $request){
        $data = new User;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->usertype = $request->usertype;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->password = $request->password;
        $data->save();

        return redirect()->back()->with('add_user', 'User Added  Succesfully');
    }
}
