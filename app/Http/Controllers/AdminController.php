<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
     //this code is used to redirect page on basics of admin and login
    public function product()
        {
            if(Auth::id())
            {
                if(Auth::user()->usertype=='1')
                {
                    return view('admin.product');
                }
                else{
                     return redirect()->back();
                }
                
            }
            else
            {

            
            return redirect('login');
            }
        }

        public function uploadproduct(Request $request)
        {
            //this code use for validation
            $request->validate([
                'title' => 'required',
                'price' => 'required',
                'des' => 'required|min:5|max:255',
                'quantity' => 'required',
            ]);
            
            //this code is used for image upload in database
            $data=new product;
            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('productimage',$imagename);
            $data->image=$imagename;

            
               //this code use for upload data in database
            $data->title=$request->title;
            $data->price=$request->price;
            $data->des=$request->des;
            $data->quantity=$request->quantity;
            
            $data->save();
             //this code is used to after submit form it show message for success
            return redirect()->back()->with('message','product added successfully');
        }



        public function showproduct()
        {
            $data=product::all();
            return view('admin.showproduct',compact('data'));
        }


          //this code is used to delete product from database
        public function deleteproduct($id)
        {
            $data=product::find($id);
            $data->delete();
            return redirect()->back();
        }



         
        public function updateview($id)
        {
            $data=product::find($id);
            return view('admin.updateview',compact('data'));
        }


           //this code is used to update product
        public function updateproduct(Request $request ,$id)
        {
        
         //this code is used for update image
            $data=product::find($id);
            $image=$request->image;
            if($image)
            {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('productimage',$imagename);
            $data->image=$imagename;
            }
            //this code is used to update field data in database
            $data->title=$request->title;
            $data->price=$request->price;
            $data->des=$request->des;
            $data->quantity=$request->quantity;
            $data->save();
            return redirect()->back()->with('message','product updated successfully');
        }




          //This code is show all product on admin page
        public function showorder()
        {
            $order=order::all();
            return view('admin.showorder',compact('order'));
        }



    public function updatestatus($id)
    {
    }

}
