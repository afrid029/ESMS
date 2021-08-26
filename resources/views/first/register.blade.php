@extends('welcome')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Register Now</h1>
  <div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br />
    @endif

    <form method="post" action="{{route('users.store')}}">
    <!-- <form method="post" action="#"> -->
        @csrf
          <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" class="form-select" name="gender">
                <option value="">Select</option>
                <option value="F">Female</option>
                <option value="M">Male</option>
            </select>
          </div>
          <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
              <label for="num">Mobile No:</label>
              <input type="text" class="form-control" name="mobile"/>
          </div>
          <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <input type="hidden" name="role" value="customer" />
          <br>
          <button type="submit" class="btn btn-primary">Sign Up</button>
      </form>
    </div>
</div>
@endsection
