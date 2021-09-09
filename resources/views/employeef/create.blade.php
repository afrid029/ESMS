@extends('dashboard.header')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Entroll a New Employee</h2>
        </div>
    </div>
</div>
<!-- error messages --> 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
<form action="{{route('users.store')}}" method="post">
    @csrf
     <div class="row">
        
            <div class="form-group">
                <strong>Name :</strong>
                <input type="text" name="name" class="form-control" >
            </div>
        </br>
        
            <div class="form-group">
                <strong>Email :</strong>
                <input type="text" name="email" class="form-control" >
            </div>
        </br>
        <div class="form-group">
            <label for="gender"><strong>Gender</strong></label>
            <select id="gender" class="form-select" name="gender">
                <option value="">Select</option>
                <option value="F">Female</option>
                <option value="M">Male</option>
            </select>
          </div>
        
            <div class="form-group">
                <strong>Address :</strong>
                <input type="text" name="address" class="form-control" >
            </div></br>
      
        <div class="form-group">
              <label for="num"><strong>Mobile No:</strong></label>
              <input type="text" class="form-control" name="mobile"/>
        </div>
        
          <div class="form-group">
              <label for="password"><strong>Password:</strong></label>
              <input type="password" class="form-control" name="password"/>
</br>
          </div>
        
        <input type="hidden" name='role' value='employee'>
      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Entroll</button>
        </div>
    </div>
   
</form>

@endsection