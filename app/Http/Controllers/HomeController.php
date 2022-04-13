<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }
        else{
            $data=product::paginate(6);
            $user=auth()->user();

            $count=cart::where('phone',$user->phone)->count();

            return view('user.home',compact('data','count'));
        }
    }


    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else{
  
            $data=product::paginate(6);
            

            return view('user.home',compact('data'));
       
    }
}

          //This code is use to addcart 
         public function addcart(Request $request ,$id)
         {
           if(Auth::id())
           {
               $user=auth()->user();
               $product=product::find($id);
               $cart=new cart;
               $cart->name=$user->name;
               $cart->phone=$user->phone;
               $cart->address=$user->address;
               $cart->product_title=$product->title;
               $cart->price=$product->price;
               $cart->quantity=$request->quantity;
               $cart->save();

               return redirect()->back()->with('message','cart Added successfully');
           }
           else{
               return redirect('login');
           }
         }

       //this code is use to show cart in user page
         public function showcart()
         {
            $user=auth()->user();
            $order=order::all();
            //$user=user::all();

            $cart=cart::where('phone',$user->phone)->get();

            $count=cart::where('phone',$user->phone)->count();

           return view('user.showcart',compact('count','cart','order','user'));
         }


           //this code is used delete cart data from user
         public function deletecart($id)
         {
             $data=cart::find($id);
             $data->delete();
             return redirect()->back();
         }


         //This cart is used to confirmorder by user
         public function confirmorder(Request $request)
         {
           

             $user=auth()->user();
             $name=$user->name;
             $phone=$user->phone;
             $address=$user->address;

             foreach($request->productname as $key=>$productname)
             {
                 $order=new order;
                 $order->product_name=$request->productname[$key];
                 $order->price=$request->price[$key];
                 $order->quantity=$request->quantity[$key];
                 $order->name=$name;
                 $order->phone=$phone;
                 $order->address=$address;
                 $order->status='not deliverd';
                 $order->save();

             }
             //This code is use to take data from database 
             DB::table('carts')->where('phone',$phone)->delete();
             return redirect()->back()->with('message','Product Order successfully');
             
         }
}
