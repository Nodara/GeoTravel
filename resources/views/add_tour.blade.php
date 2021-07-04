<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
    <title> Add Tour </title>
</head>
<body>

    <header class="topnav">
        <a href="/admin">Back</a>
        <div class="logout">
            <a href="{{ url('/logout') }}">Logout</a>
        </div>
    </header>
    <form method="post" action="{{url('add_tour')}}">
        {{ csrf_field() }}

        <div>
            <label for="title"> Title : </label>
            <input type="text" name="title" id="title"><br>

        </div>


        <div>
            <label for="image_url">Image URL : </label>
            <input type="text" name="image_url" id="image_url"><br>
            <label for="text">Text : </label>

        </div>

        <textarea name="text" id="text" cols="30" rows="10"></textarea><br>

        <label for="cost"> Cost : </label>
        <input type="number" name="cost" id="cost" ><br>

        <label for="duration"> Duration : </label>
        <input type="number" name="duration" id="duration" ><br>

        <button>Save</button>

    </form>
</body>
</html>
