<?php

namespace App\Exports;

use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExportPaid implements FromView
{
    use Exportable;

    public function view(): View
    {
        // TODO: Implement view() method.
        return view('order.OrderAllPdf', [
            'orders' => Order::where('status','dibayar')->get()
        ]);
    }
}
