<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
    <title>Edit Posts</title>
</head>
<body>
    <header class="topnav">
        <a href="/admin">Back</a>
        <div class="logout">
            <a href="{{ url('/logout') }}">Logout</a>
        </div>
    </header>

    <form class="form" method="post" action="/edit_post_force/{{$post[0]->id}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
            <div>
                <label for="title"> Title : </label>
                <input type="text" name="title" id="title" value="{{$post[0]->title}}"><br>
            </div>

            <br>

            <div>

                <label for="image_url">Image URL : </label>
                <input type="text" name="image_url" id="image_url" value="{{$post[0]->image_url}}"><br><br>
                <label for="text"> Text : </label>
            </div>



            <textarea name="text" id="text" cols="30" rows="10">
            {{$post[0]->text}}
        </textarea><br>

            <button>Save</button>

    </form>
    <div style="margin-top: 40px">

        <a href="/admin">Return To Posts Page </a>
    </div>



</body>
</html>
