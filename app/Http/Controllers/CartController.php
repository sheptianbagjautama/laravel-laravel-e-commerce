<?php

namespace App\Http\Controllers;

use App\Mail\Checkout;
use App\Mail\CheckoutMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Session;
use Cart;
use App\Order;
use App\Order_Product;


class CartController extends Controller
{
    public function index()
    {
        $products = Cart::content();
//        dd($products);
        return view('front.shopping_cart', compact('products'));
    }

    public function update($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, ['qty'=>$item->qty + 1]);

        Session::flash('status','Berhasil menambahkan quantity product');
        return redirect()->back();
    }

    public function kurangi($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, ['qty'=>$item->qty - 1]);

        Session::flash('status','Berhasil mengurangi quantity product');
        return redirect()->back();
    }

    public function destroy()
    {
        Cart::destroy();
        Session::flash('status','Keranjang berhasil dikosongkan');
        return redirect('shopping-cart');
    }

    public function checkout()
    {
        $this->middleware('role:customer');
        return view('customer.checkout');
    }

    public function bayar(Request $request)
    {
        $user_id = Auth::user()->id;
        $receiver = $request->name;
        $address = $request->address;
        $total_bayar = 0;

        $keranjang = Cart::content();
        foreach ($keranjang as $cart){
            $total_bayar += $cart->subtotal;
        }

        $order = new Order;
        $order->user_id = $user_id;
        $order->receiver = $receiver;
        $order->address = $address;
        $order->total_price = $total_bayar;
        $order->date = Carbon::now();
        $order->save();

        foreach ($keranjang as $cart){
            $order_product = new Order_Product;
            $order_product->order_id = $order->id;
            $order_product->product_id = $cart->id;
            $order_product->qty = $cart->qty;
            $order_product->subtotal = $cart->subtotal;
            $order_product->save();
        }

//        $order_product->product()->name;
//        $order_product->order()->receiver;

        $user = User::findOrFail($user_id);
        Mail::to($user)->send(new CheckoutMail($user,$order));

        return redirect('invoice')->with('status','Anda berhasil melakukan checkout');
    }
}
