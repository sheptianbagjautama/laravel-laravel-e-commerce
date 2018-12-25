<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Exports\OrderExportPaid;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use App\Order_Product;
use PDF;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $orders = Order::orderBy('id','desc')->get();
        return view('order.index', compact('orders'));
    }

    public function detail($id)
    {
        $details = Order_Product::where('order_id',$id)->get();
        $identity = Order_Product::where('order_id',$id)->first();
        return view('order.detail', compact('details', 'identity'));
    }

    public function exportPDFAll()
    {
        $orders = Order::all();
        $pdf = PDF::loadView('order.OrderAllPdf', compact('orders'));
        return $pdf->stream('orders.pdf');
    }

    public function exportPDF()
    {
        $orders = Order::where('status','dibayar')->get();
        $pdf = PDF::loadView('order.OrderAllPdf', compact('orders'));
        return $pdf->stream('orders_lunas.pdf');
    }

    public function exportExcel()
    {
        return (new OrderExport())->download('orders.xlsx');
    }

    public function exportExcelPaid()
    {
        return (new OrderExportPaid())->download('orders_paid.xlsx');
    }
}
