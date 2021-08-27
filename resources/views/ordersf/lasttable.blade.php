@extends('dashboard.header')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Order Details</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Detail</th>
            <th>Price</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Customer Mobile No</th>
            <th>Date</th>
        </tr>

        @foreach ($data as $order)
        <tr>
            <td>ok</td>
            <td>{{ $order->prod_name }}</td>
            <td>{{ $order->detail }}</td>
            <td>{{ $order->name }}</td>

            <td>{{ $order->name }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->mobile }}</td>
            <td>{{ $order->created_at }}</td>
            
           
        </tr>
        @endforeach
    </table>

@endsection