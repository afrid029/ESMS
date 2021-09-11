@extends('dashboard.header')
@section('content')
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</br>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Detail</th>
            <th>Price</th>
            <th>Delivery Person</th>
            <th width="280px">Status</th>
        </tr>
        <?php $i = 1; ?>
        @foreach ($products as $product)
        <tr>
            <td>{{$i++}}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_detail }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->name }}</td>
                @if($product->order_status == "Delivered")
                <td>Delivered</td>
                @else
                    @if($product->order_status == "cancelled")
                    <td>Cancelled</td>
                    @else
            <td>
            <form action="{{ route('myaction')}}" method="POST">
                @csrf 
                <input type="hidden" name="action" value="cancelled">
                <input type="hidden" name="raw_id" value="{{$product->id}}">
                <button type="submit" class="btn btn-danger">Cancel Order</button>
            </form>
            </td>
            @endif
            @endif
        </tr>
        @endforeach
    </table>
@endsection