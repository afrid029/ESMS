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
            <th>Delivered</th>
        </tr>
        <?php $i = 1 ?>
        @foreach ($orders as $order)
        <tr>
            <td>{{$i++}}</td>
            <td>{{ $order->product_name }}</td>
            <td>{{ $order->product_detail }}</td>
            <td>{{ $order->price }}</td>

            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->customer_address }}</td>
            <td>{{ $order->customer_mobile }}</td>
            <td>{{ $order->date }}</td>
            @if($order->order_status == "Delivered")
                <td>Delivered</td>
                @else
                    @if($order->order_status == "cancelled")
                    <td>Cancelled</td>
                    @else
            <td>
            <form action="{{ route('myaction')}}" method="POST">
                @csrf 
                <input type="hidden" name="action" value="Delivered">
                <input type="hidden" name="raw_id" value="{{$order->id}}">
                <button type="submit" class="btn btn-success">Yes</button>
            </form>
            </td>
            @endif
            @endif
           
        </tr>
        @endforeach
    </table>

@endsection