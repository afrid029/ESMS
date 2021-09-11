@extends('dashboard.header')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Reset your password</h2>
        </div>
        <div class="pull-right">
           
        </div>
    </div>
</div>
    @if (count($errors))
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
      @endforeach
    @endif  

    @if($msg=session()->get('message'))
    <p class="alert alert-danger">{{$msg}}</p>

    @endif
    
    <form action="{{ route('employees.update',[$users->id,$users->slug]) }}" method="post">
        @csrf
        @method('PATCH')

            <div class="col-xs-12 col-sm-12 col-md-12">     
                <div class="form-group">
                    <strong>Current Password :</strong>
                    <input type="password" id="first-name" class="form-control" name="oldpassword"> 
                </div>
            <div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>New Password :</strong>
                    <input type="password" id="first-name" class="form-control" name="newpassword"> 
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm New Password :</strong>
                    <input type="password" id="first-name"  class="form-control" name="password_confirmation"> 
                </div></br>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Change</button>
            </div>   
    </form>    
  

@endsection