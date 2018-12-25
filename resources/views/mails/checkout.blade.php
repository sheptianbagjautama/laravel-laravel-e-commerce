@component('mail::message')
    <h2>Halo {{ $user->name}}</h2>

Terimakasih telah belanja di toko kami
Silahkan lakukan transfer ke no rekening toko kami dan lakukan konfirmasi pembayaran
agar pengiriman barang menjadi lebih cepat sampai :<br>
Berikut adalah data order anda :<br><br>

<h3>
Nama Penerima : {{ $order->receiver }}<br>
Alamat Penerima : {{ $order->address }}<br>
Total Harga Pemesanan : {{ $order->total_price }}<br>
Tanggal Pemesanan : {{ $order->date }}<br>
Status : {{ $order->status }}
</h3>


Jika anda ingin redirect ke halaman toko kami, silahkan klik tombol di bawah ini :

@component('mail::button', ['url' => '/'])
    Clik
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
