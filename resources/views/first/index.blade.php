@extends('welcome')
@section('main')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
        @if ($errors->any())
        <div class="alert alert-danger">
          <strong>Whoops! </strong>There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
        @endif
        <!-- success alert message -->
        @if ($message = Session::get('success'))
	        <div class="alert alert-success">
	            <p>{{ $message }}</p>
	        </div>
	      @endif
   <div>
      <form method="post" action="checklogin">
            @csrf
          <div class="form-group">
              <label for="email">Email: </label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="password">Password: </label>
              <input type="password" class="form-control" name="password"/>
          </div></br>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
          <div></br>
          <input type="hidden" class="form-control" name="role" value="customer"/>
      </form>
    </div>
    <div class="row">
    <form method="get" action="register">
          @csrf
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Register Now!</button> 
          <div></br>
    </form>
    </div>
 </div>
</div>
@endsection
