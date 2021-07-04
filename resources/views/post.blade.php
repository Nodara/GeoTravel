<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <title>{{$post[0]->title}}</title>
</head>
<style>
    .post-box {
        height: 900px;
        width: 900px;
        margin-top:50px;
        margin-bottom: 110px;
        margin-left: auto;
        margin-right: auto;
    }
    .post-box h1{
        text-align: center;
        font-size: 50px;
        margin: 30px;
        font-family: "Calibri Light";
    }
    .post-box p{
        text-align: center;
        font-size: 30px;
        font-family: "Calibri Light";
    }

    .post-box img{
        width: 900px;
    }


</style>
<body>
<header class="topnav">
    <div>
        <a class="active"
           href="{{url('/')}}">Home</a>
        <a href="{{url('posts')}}">Blog</a>
        <a href="{{url('tours')}}">Tours</a>
    </div>

    <div class="logout">
        <a href="{{route('getList' , ['id' => Auth::id()])}}"> <img src="data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTEwLjczNSA1MTAuNzM1IiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMC43MzUgNTEwLjczNSIgd2lkdGg9IjUxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Zz48cGF0aCBkPSJtMzQuNzY0IDIzNi4wMDcgNTkuNDgxIDIyMC41NTYgMzIxLjk4NSAxLjAwOSA1Ny43MDQtMjIxLjU2NXoiIGZpbGw9IiNmZGJmMDAiLz48cGF0aCBkPSJtMjU0LjM0OSA0NTcuMDY1IDE2MS44ODEuNTA3IDU3LjcwNC0yMjEuNTY1aC0yMTkuNTg1eiIgZmlsbD0iI2ZmOTEwMCIvPjxwYXRoIGQ9Im00ODQuMDI3IDIyNy41MzhjLTIuODQ1LTMuNjExLTcuMTg4LTUuNzE5LTExLjc4NC01LjcxOWgtMzI1LjMyYy0uNjU0LS4wNDktMS4zMi0uMDM5LTEuOTkxIDBoLTEwNi40MTdjLTQuNTk2IDAtOC45MzggMi4xMDYtMTEuNzgyIDUuNzE2LTIuODQ0IDMuNjA5LTMuODc3IDguMzI0LTIuODAyIDEyLjc5Mmw1My4wNjggMjIwLjYzM2MxLjYyMSA2Ljc0MSA3LjY1MSAxMS40OTIgMTQuNTg0IDExLjQ5Mmg4MS43MzljLjAxMSAwIC4wMjEuMDAxLjAzMi4wMDEuMDE2IDAgLjAzMS0uMDAxLjA0Ny0uMDAxaDE2My45NzNjLjAxNiAwIC4wMzIuMDAxLjA0Ny4wMDEuMDExIDAgLjAyMS0uMDAxLjAzMi0uMDAxaDgxLjZjNi45MyAwIDEyLjk1OC00Ljc0OCAxNC41ODItMTEuNDg0bDUzLjE5LTIyMC42MzRjMS4wNzctNC40NjkuMDQ2LTkuMTg1LTIuNzk4LTEyLjc5NnptLTUwLjE4MSAxMDQuNTQ5aC02NS42NzRsMTAuMDIyLTgwLjI2OWg3NS4wMDN6bS0xNjMuNDU4IDExMC4zNjZ2LTgwLjM2NWg2My44MDVsLTEwLjAzNCA4MC4zNjV6bS04My43NzQgMC0xMC4wNDMtODAuMzY1aDYzLjgxN3Y4MC4zNjV6bS0xMy43OTItMTEwLjM2Ni0xMC4wMzEtODAuMjY5aDc3LjU5N3Y4MC4yNjl6bTk3LjU2NiAwdi04MC4yNjloNzcuNTczbC0xMC4wMjIgODAuMjY5em0tMTM3LjgzLTgwLjI2OSAxMC4wMzEgODAuMjY5aC02NS43MzFsLTE5LjMwNy04MC4yNjl6bS00OC40ODUgMTEwLjI2OWg2Mi4yNjVsMTAuMDQzIDgwLjM2NWgtNTIuOTc4em0zMjMuMTY2IDgwLjM2NmgtNTIuODQ3bDEwLjAzNC04MC4zNjVoNjIuMTg3eiIgZmlsbD0iI2ZmODcwMCIvPjxwYXRoIGQ9Im00NzIuMjQzIDIyMS44MThoLTIxNi42Nzd2MjUwLjYzNGg4MS44MDhjLjAxNiAwIC4wMzIuMDAxLjA0Ny4wMDEuMDEgMCAuMDIxLS4wMDEuMDMxLS4wMDFoODEuNmM2LjkzIDAgMTIuOTU4LTQuNzQ4IDE0LjU4Mi0xMS40ODRsNTMuMTktMjIwLjYzNGMxLjA3Ny00LjQ2OS4wNDYtOS4xODUtMi43OTgtMTIuNzk2LTIuODQzLTMuNjEyLTcuMTg2LTUuNzItMTEuNzgzLTUuNzJ6bS0xNDguMDg1IDIyMC42MzVoLTUzLjc3MXYtODAuMzY1aDYzLjgwNXptMTMuNzgtMTEwLjM2NmgtNjcuNTUxdi04MC4yNjloNzcuNTczem02OS4zMDEgMTEwLjM2NmgtNTIuODQ3bDEwLjAzNC04MC4zNjVoNjIuMTg3em0yNi42MDctMTEwLjM2NmgtNjUuNjc0bDEwLjAyMi04MC4yNjloNzUuMDAzeiIgZmlsbD0iI2ZmNjQxYSIvPjxnPjxwYXRoIGQ9Im04OS4yMDMgMjExLjkzMWMtMi4zNjcgMC00Ljc2OS0uNTYyLTcuMDA2LTEuNzQ2LTcuMzIxLTMuODc2LTEwLjExNC0xMi45NTQtNi4yMzgtMjAuMjc1bDc2LjA1LTE0My42NDRjMy44NzYtNy4zMjEgMTIuOTU2LTEwLjExMyAyMC4yNzUtNi4yMzggNy4zMjEgMy44NzYgMTAuMTE0IDEyLjk1NCA2LjIzOCAyMC4yNzVsLTc2LjA1IDE0My42NDRjLTIuNjkxIDUuMDg0LTcuODkxIDcuOTg0LTEzLjI2OSA3Ljk4NHoiIGZpbGw9IiM0NDQiLz48L2c+PGc+PHBhdGggZD0ibTQyMS40NDQgMjExLjkzMWMtNS4zNzkgMC0xMC41NzctMi45LTEzLjI3LTcuOTg0bC03Ni4wNS0xNDMuNjQ0Yy0zLjg3Ni03LjMyMS0xLjA4My0xNi4zOTkgNi4yMzgtMjAuMjc1IDcuMzI0LTMuODc2IDE2LjM5OS0xLjA4MyAyMC4yNzUgNi4yMzhsNzYuMDUgMTQzLjY0NGMzLjg3NiA3LjMyMSAxLjA4MyAxNi4zOTktNi4yMzggMjAuMjc1LTIuMjM2IDEuMTg0LTQuNjM4IDEuNzQ2LTcuMDA1IDEuNzQ2eiIgZmlsbD0iIzI5MjkyOSIvPjwvZz48Zz48cGF0aCBkPSJtNTAyLjEgMjUxLjgxOWgtNDkzLjQ2NGMtNC43NjkgMC04LjYzNi0zLjg2Ni04LjYzNi04LjYzNnYtNDcuNzI3YzAtNC43NjkgMy44NjYtOC42MzYgOC42MzYtOC42MzZoNDkzLjQ2NGM0Ljc2OSAwIDguNjM2IDMuODY2IDguNjM2IDguNjM2djQ3LjcyN2MtLjAwMSA0Ljc2OS0zLjg2NyA4LjYzNi04LjYzNiA4LjYzNnoiIGZpbGw9IiNmZjRhNGEiLz48L2c+PHBhdGggZD0ibTUwMi4xIDE4Ni43ODctMjQ2LjU3MS4wMzR2NjQuOTk4bDI0Ni41NzEtLjAzNGM0Ljc2OSAwIDguNjM2LTMuODY2IDguNjM2LTguNjM2di00Ny43MjdjLS4wMDEtNC43NjktMy44NjctOC42MzUtOC42MzYtOC42MzV6IiBmaWxsPSIjZTIwMDU5Ii8+PC9nPjwvc3ZnPg==" </a>
        <a href="{{ url('/logout') }}">Logout</a>
    </div>
</header>

    <div class="post-box">
        <img src="{{$post[0]->image_url}}" alt="">
        <h1 > {{$post[0]->title}} </h1>
        <p> {{$post[0]->text}}  </p>
    </div>

</body>
</html>
