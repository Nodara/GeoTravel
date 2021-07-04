<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
    <title>Admin Panel</title>
</head>
<body>
    <header class="topnav">
        <div>
            <a href="{{url('/')}}">Home</a>
            <a href="{{url('/admin/posts')}}"> Manage Posts </a>
            <a href="{{url('/admin/tours')}}"> Manage Tours </a>
            <a href="add_post"> Add a new Post </a>
            <a href="add_tour"> Add a new Tour </a>
        </div>

        <div class="logout">
            <a href="{{ url('/logout') }}">Logout</a>
        </div>
    </header>



    <div style="text-align: center;font-size: 50px">
        <p>
            All users : {{$usersQuantity}}
        </p>

        <p>
            All Posts : {{$postsQuantity}}
        </p>

        <p>
            All Tours : {{$toursQuantity}}
        </p>

    </div>








</body>
</html>
