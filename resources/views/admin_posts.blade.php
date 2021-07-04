<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
    <title>Admin Panel\Posts</title>
</head>
<body>
    <header class="topnav">
        <a href="/admin">Back</a>
        <div class="logout">
            <a href="{{ url('/logout') }}">Logout</a>
        </div>
    </header>

    @foreach($posts as $post)
        <div class="blog-box">
            <img src="{{$post->image_url}}" alt="">

            <p class="blog-title">
                {{$post->title}}
            </p>

            <p class="blog-text">
                {{$post->text}}...
            </p>
            <a href="{{route('editable_post', ['id' => $post->id])}}">EDIT</a>
            <a href="{{route('delete_post', ['id' => $post->id])}}">DELETE</a>
            <hr>

        </div>
    @endforeach

</body>
</html>
