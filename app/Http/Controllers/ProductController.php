<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('product',['products'=>$product]);
    }

    public function detail($id) {

        $product = Product::find($id);
        return view('detail',['product'=>$product]);
    }

    public function search(Request $req){

        $data = Product::where('name','like','%'.$req->input('query').'%')->get();
        return view('seach',['products'=>$data]);
    }

    function addToCart(Request $req) {


        if($req->session()->has('user'))
        {
            $cart = new Cart();
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id= $req->product_id;
            $cart->save();
            return redirect('/');
        }
        else
        {
            return redirect('login');
        }

    }

     function cartItem(){
        $user_id = Session::get('user')['id'];
        return Cart::where('user_id',$user_id)->count();
    }

     function cartList(Request $request){

        $user_id = Session::get('user')['id'];

        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id',$user_id)
            ->select('products.*','cart.id as cart_id')
            ->get();



        return view('cartList',['products'=>$products]);
    }

    function cartRemove($id){

        Cart::destroy($id);
        return redirect('cartlist');

    }

    function orderNow(){
        $user_id = Session::get('user')['id'];

        $total =  $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id',$user_id)
            ->sum('products.price');


        return view('order_now',['total'=>$total]);
    }

    function orderPlace(Request $req){

        $user_id = Session::get('user')['id'];
        $allCart = Cart::where('user_id',$user_id)->get();
        foreach($allCart as $cart){

            $order = new Order();
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "pending";
            $order->method = $req->payment;
            $order->payment_status= "pending";
            $order->address = $req->address;
            $order->save();
            Cart::where('user_id',$user_id)->delete();

        }
        $req->input();
        return redirect('/');
    }

    function myOrder(){
        $user_id = Session::get('user')['id'];

       $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id',$user_id)
            ->get();


        return view('myorders',['orders'=>$orders]);
    }
}
