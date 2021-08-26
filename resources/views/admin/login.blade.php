@extends('welcome')
@section('main')

<div class="row">
 <div class="col-sm-8 offset-sm-2">

        <!-- @if(isset(Auth::user()->email))
        <script>window.location="success";</script>
        @endif -->

        @if ($message = Session::get('error'))
        <div>
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
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
    <form method="get" action="">
          @csrf
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Register Now!</button> 
          <div></br>
      </form>
    </div>
 </div>
</div>
@endsection
