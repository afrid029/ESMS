@extends('dashboard.header')
@section('content')
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Detail</th>
            <th>Price</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>ok</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a class="btn btn-success" href="{{ route('products.order',$product->id) }}">Place Order</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection