<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Cart;
use Session;

class BerandaController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->where('status','publish')->get();
        return view('front.home', compact('products'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        Cart::add(
            [
                'id'    =>$product->id,
                'name'  =>$product->name,
                'qty'   =>1,
                'price' =>$product->price
            ]);
        Session::flash('status','Product berhasil dimasukkan ke keranjang');
        return redirect()->back();
    }

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $products = $category->products()->where('status','publish')->orderBy('updated_at','desc')->paginate(18);
        return view('front.product_category', compact('products'));

    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('front.detail_product', compact('product'));
    }



}
