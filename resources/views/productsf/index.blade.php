@extends('dashboard.header')
@section('main')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>E-Store Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('products.create')}}">Create New Product</a>
            </div></br>
        </div>
    </div>
   
   <!-- success alert message -->
        @if ($message = Session::get('success'))
	        <div class="alert alert-success">
	            <p>{{ $message }}</p>
	        </div>
	    @endif
   
        <table class="table table-bordered">
	        <tr>
	            <th>ID</th>
	            <th>Name</th>
	            <th>Details</th>
	            <th width="280px">Actions</th>
	        </tr>
	        @foreach($products as $product)
	        <tr>
	            <td>{{++$i}}</td>
	            <td>{{$product->name}}</td>
	            <td>{{$product->detail}}</td>
	            <td>
                    <form action="{{route('products.destroy',$product->id)}}" method="post">
	                    @method('DELETE')
	                    @csrf
	                    <a href="{{route('products.show',$product->id)}}" class="btn btn-info" >Show</a>
	                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary" >Edit</a>
	                    <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
                    
                </td>
	        </tr>
	        @endforeach
	    </table>
		<div class="pagination justify-content-center">
			
		</div>

@endsection