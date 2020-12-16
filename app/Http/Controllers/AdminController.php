<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;
use App\Models\Products;
class AdminController extends Controller
{
    public function users(Request $request)
    {
        try {
            return view('admin.users')->with('users',User::paginate(10));
        } catch (Exception $e) {
            
        }
    }

    public function orders(Request $request)
    {
        try {
            return view('admin.orders')->with('data',Order::with('client')->paginate(10));
        } catch (Exception $e) {
            
        }
    }
    public function products(Request $request)
    {
        try {
            return view('admin.products')->with('data',Products::paginate(10));
        } catch (Exception $e) {
            
        }
    }
    
    
    public function clientInfo(Request $request)
    {
        return view('admin.client.index');
    }
    public function userAdminShow(Request $request,$id = null)
    {
        $user = User::with('userType','addresses','myOrdersActive','myOrdersFinish')->find($id);

        if($request->type == 'address'){
            return view('admin.user.address')->with('data',Address::where('user_id',$user->id)->paginate(10));
        }

        if($request->type == 'ordact'){
            return view('admin.user.ordact')->with('data',Order::where('user_id',$user->id)->where('status','<>','finish')->paginate(10));
        }

        if($request->type == 'ordfinish'){
            return view('admin.user.ardfinish')->with('data',Order::where('user_id',$user->id)->where('status','=','finish')->paginate(10));
        }

        return view('admin.user.index')->with('user',$user);
    }
}
