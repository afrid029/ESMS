@extends('dashboard.header')
@section('content')
Place Order
  
    <form action="{{route('orders.store')}}" method="post">
        @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control">
                </div>
            </div><br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Price :</strong>
                    <input type="text" name="price" value="{{$product->price}}" class="form-control">
                </div>
                
            </div><br>
            <select name="employee_id">
                @foreach($employees as $user)
                {
                    <option value="{{$user->id}}">{{$user->name}}</option>
                }
                @endforeach
        
            </select><br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" value="{{Auth::user()->id}}" name="customer_id" class="form-control" placeholder="Price">
                    <input type="hidden" value="{{$product->id}}" name="product_id" class="form-control" placeholder="Price">
                </div></br>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Order</button>
            </div>
        </div>
   
    </form>

@endsection