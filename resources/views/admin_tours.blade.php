<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <title>Admin Panel\Tours</title>
</head>

<body>
    <header class="topnav">
        <a href="/admin">Back</a>
        <div class="logout">
            <a href="{{ url('/logout') }}">Logout</a>
        </div>
    </header>

    @foreach($tours as $tour)
        <div class="tour-box">
            <img src="{{$tour->image_url}}" alt="">

            <p class="blog-title">
                {{$tour->title}}
            </p>

            <p class="blog-text">
                {{$tour->text}}...
            </p>
            <a href="{{route('editable_tour', ['id' => $tour->id])}}">EDIT</a>
            <a href="{{route('delete_tour', ['id' => $tour->id])}}">DELETE</a>
            <hr>

        </div>
    @endforeach

</body>
</html>
