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
        <?php $i=0 ?>
        @foreach ($orders as $order)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->detail }}</td>
            <td>{{ $order->price }}</td>
            <td>
                <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
    
                    <a class="btn btn-success" href="#">Place Order</a>
   
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    <div class="pagination justify-content-center">
        
    </div>

@endsection