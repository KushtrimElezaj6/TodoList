<x-layouts.app>

    @section('title', $todo->title . ' - ' . config('app.name'))
    
    @section('content')
        @if (Session::has('message'))
            {{ Session::get('message') }}
        @endif
    
        @if ($errors->has('update_id'))
            {{ $errors->first('update_id') }}
        @endif
    
        <h1> Edit your task </h1>
    
        <form action="/todo/edit/{{ $todo['id'] }}" method="POST">
            @csrf
            @method('PATCH')
    
            <input type="text" name="title" value="{{ old('title', $todo['title']) }}" required>
            <br>
            <input type="text" name="content" value="{{ old('content', $todo['content']) }}" required>
            <br>
            <input type="completed" name="completed" value="{{old('completed',$todo['completed']) }}"required>
            <br>
            <input type="date" name="completed_at" value="{{ old('completed_at', $todo['completed_at']) }}" required>
            <br>
    
            <button type="submit"> Update Task </button>
        </form>
    
        <form action="/todo/{{$todo['id']}}/completed " method="POST">
             @csrf
             @method('PATCH')
    
            <button type="submit" >
                completed
            </button>
    
    
        </form>
    
        <br>
        <br>
    @endsection
    </x-layouts.app>