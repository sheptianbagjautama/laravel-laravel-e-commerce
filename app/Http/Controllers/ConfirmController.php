<?php

namespace App\Http\Controllers;

use App\Confirm;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use Session;

class ConfirmController extends Controller
{
    public function index($id)
    {
        $order = Order::findOrFail($id);
        return view('customer.confirm', compact('order'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $order_id = $request->order_id;
//        $input['image'] = $request->get('image');

//        if ($request->hasFile('image')){
//            $input['image'] = '/upload/confirm/'.str_slug($input['image'], '-').'.'.$request->image->getClientOriginalExtension();
//            $request->image->move(public_path('/upload/confirm/'), $input['image']);
//        }

//        if ($files= $request->file('image')){
//            $name=$files->getClientOriginalName();
//            $files->move(public_path('/upload/confirm/',$name));
////            $files->move('confirm',$name);
//            $image = asset('upload/confirm/'.$name);
//        }

            $confirm = new Confirm;
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('upload/confirm', $newName);

            $confirm->user_id       = $user_id;
            $confirm->order_id      = $order_id;
            $confirm->image         = $newName;
            $confirm->status_order  = 'menunggu verifikasi';
            $confirm->save();


        $order = Order::where('id',$order_id)->first();
        $order->status = 'menunggu verifikasi';
        $order->save();

        Session::flash('status','Konfirmasi Bukti Pembayaran Berhasil Dikirim');
        return redirect('invoice/list');
    }
}
