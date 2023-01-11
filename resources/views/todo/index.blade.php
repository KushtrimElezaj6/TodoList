<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
@if (Session::has('message'))
    {{ Session::get('message') }}
@endif

@if ($errors->has('delete_id'))
    {{ $errors->first('delete_id') }}
@endif

<h1>Create Task</h1>

<x-layouts.create-post-form> </x-layouts.create-post-form>
<form action="/todo" method="POST">
    @csrf

    Title:<input type="string" name="title" value="{{ old('title') }}" required>
    Content:<input type="text" name="content" value="{{ old('content') }}" required>

    <button type="submit"> Create Task </button>
</form>


<br>

@foreach ($todos as $todo)
    <br>
    Title:{{ $todo['title'] }}
    <br>
    Content:{{ $todo['content'] }}
    <br>
    <br>
    <a href="todo/edit/{{ $todo['id'] }}">Edit</a>
    <form action="/todo/{{ $todo['id'] }}" method="POST">

        @csrf
        @method('DELETE')
        <input type="submit" name="" id="" value="delete">
    </form>
@endforeach

</body>

</html>