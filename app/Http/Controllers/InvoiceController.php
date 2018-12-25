<?php

namespace App\Http\Controllers;

use App\Confirm;
use Cart;
use Illuminate\Http\Request;
use App\Order;
use App\Order_Product;
use App\Product;
use Auth;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:customer');
    }

    public function index()
    {
        $products = Cart::content();
        $total = Cart::subtotal();
        Cart::destroy();
        $user_id = Auth::user()->id;

        return view('customer.invoice', compact('products','total','user_id'));
    }

    public function list()
    {
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id',$user_id)
            ->orderBy('id','desc')
            ->get();

        return view('customer.list_invoice', compact('orders'));
    }

    public function detail($id)
    {
        $details = Order_Product::where('order_id',$id)->get();
        return view('customer.invoice_detail',compact('details'));


//        $order = array();
//
//        foreach ($details as $key => $detail){
//            $detailArray = array();
//            $detailArray['name_product']        = $detail->product->name;
//            $detailArray['qty']         = $detail->qty;
//            $detailArray['subtotal']    = $detail->subtotal;
//            array_push($order, $detailArray);
//        }



//        return response()->json([
//           'hasil'  => $order
//        ]);
    }
}
