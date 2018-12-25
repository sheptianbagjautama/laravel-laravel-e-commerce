
<style>
    #order {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #order td, #order th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #order tr:nth-child(even){background-color: #f2f2f2;}

    #order tr:hover {background-color: #ddd;}

    #order th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<table id="order" width="100%">
    <thead>
    <tr>
        <td>ID</td>
        <td>Customer</td>
        {{--<td>Address</td>--}}
        <td>Total</td>
        <td>Date</td>
        <td>Status</td>
    </tr>
    </thead>
    @foreach($orders as $o)
        <tbody>
        <tr>
            <td>{{ $o->id }}</td>
            <td>{{ $o->receiver }}</td>
            {{--<td>{{ $o->address }}</td>--}}
            <td>Rp. {{ number_format($o->total_price,0) }}</td>
            <td>{{ $o->date }}</td>
            <td>{{ ucwords($o->status) }}</td>
        </tr>
        </tbody>
    @endforeach

</table>




