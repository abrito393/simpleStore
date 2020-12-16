<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Cart;
class UserController extends Controller
{
    public function address(Request $request,$id = null)
    {
        return view('admin.client.address')->with('data',Address::where('user_id',$id)->paginate(10));
    }

    public function data(Request $request,$id = null)
    {
        return view('admin.client.info')->with('data',User::find($id));
    }

    public function orders(Request $request,$id = null)
    {
        return view('admin.client.orders')->with('data',Order::with('products.product')->where('user_id',$id)->paginate(10));
    }

    public function addressCreate(Request $request)
    {
        return view('admin.client.address.create');
    }

    public function addressSave(Request $request)
    {
        Address::create([
            "address" => $request->address,
            "user_id" => $request->user()->id
        ]);

        return response()->json([
            'access_token' => $request->access_token,
            'user_type_id' => $request->user()->userType->type,
            'user' => $request->user()->toArray()
        ],200);
    }

    public function addProduct(Request $request)
    {
        Cart::create([
            'product_id' => $request->product,
            'user_id' => $request->user()->id
        ]);

        return 1;
    }

    public function checkCart(Request $request)
    {
        return Cart::with('product')->where('user_id',$request->user()->id)->get();
    }

    public function reviewCart(Request $request,$id = null)
    {
        $car = Cart::with('product')->where('user_id',$id)->get();
        $direcciones = Address::where('user_id',$id)->get();
        return view('admin.client.checkout')->with('data',$car)->with('direcciones',$direcciones)->with('user_id',$id);
    }

    public function carPay(Request $request,$id = null)
    {
        $carts = Cart::with('product')->where('user_id',$id)->get();
        $order = Order::create([
            'status' => 'approved',
            'user_id' => $id
        ]);

        foreach ($carts as $cart) {
            OrderDetails::create([
                'quantity' => 1,
                'product_id' => $cart->product->id,
                'order_id' => $order->id
            ]);
        }

        Cart::with('product')->where('user_id',$id)->delete();

        return redirect()->route('home');
    }
}
