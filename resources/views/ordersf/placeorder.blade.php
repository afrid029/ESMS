@extends('dashboard.header')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Place Order</h2>
            </div>
        </div>
    </div>
  
    <form action="{{route('orders.store')}}" method="post">
        @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input readonly type="text" name="name" value="{{$product->name}}" class="form-control">
                </div>
            </div><br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Price :</strong>
                    <input readonly type="text" name="price" value="{{$product->price}}" class="form-control">
                </div><br>
                
            </div>
            <select name="employee_id">
                @foreach($employees as $user)
                {
                    <option value="{{$user->id}}">{{$user->name}}</option>
                }
                @endforeach
        
            </select><br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" value="{{Auth::user()->id}}" name="customer_id" class="form-control">
                    <input type="hidden" value="{{$product->id}}" name="product_id" class="form-control">
                    <input type="hidden" value="{{$product->detail}}" name="product_detail" class="form-control" >
                    <input type="hidden" value="{{$product->name}}" name="product_name" class="form-control">
                </div></br>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Order</button>
            </div>
        </div>
   
    </form>

@endsection