<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

<body style = "width: 80%; margin-left:10%; margin-right:10%; margin-top:1%;">
    @if(Auth::user()->role == "admin")
    <nav class="navbar navbar-dark bg-primary">
    <h1 style="text-align:center">Admin Dashboard</h1>
    </nav></br>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
	    <div class="collapse navbar-collapse" id="navbarNav">
        <ul  class="navbar-nav pull-right">
		    <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="dashboard">{{ Auth::user()->name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('products.index')}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.index')}}">Employee</a>
             </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav></br>


    @elseif(Auth::user()->role == "employee")
    <nav class="navbar navbar-dark bg-primary">
        <h1 style="text-align:center">Employee Dashboard</h1>
        </nav></br>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
	        <div class="collapse navbar-collapse" id="navbarNav">
            <ul  class="navbar-nav pull-right">
		        <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="dashboard">{{ Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('employees/'. Auth::user()->id .'/edit')}}">Reset Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('orders.index')}}">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    @elseif(Auth::user()->role == "customer")
    <nav class="navbar navbar-dark bg-primary">
        <h1 style="text-align:center">Customer Dashboard</h1>
        </nav></br>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
	        <div class="collapse navbar-collapse" id="navbarNav">
            <ul  class="navbar-nav pull-right">
		        <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="dashboard">{{ Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('orders.index')}}">Place Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customerorders">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    @endif

    @yield('content')
<body>
</html>