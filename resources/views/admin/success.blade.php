@extends('welcome')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
   		<h3 class="display">Welcome to Admin Dashboard</h3><br/> 
           <h5>{{Auth::user()->name}}</h5>
    </div>
</div>
@endsection