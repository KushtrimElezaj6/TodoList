<x-layouts.app>

  
    
    
        @if (Session::has('message'))
             {{ Session::get('message') }}
        @endif
    
        @if ($errors->has('update_id'))
            {{ $errors->first('update_id') }}
        @endif
    
        <h1> Edit your task </h1>
        <br><br>
      </form>
      <form action="/todo/{{ $todo['id'] }}" method="POST">
          @csrf
          @method('PATCH')
          <div class="grid gap-6 mb-6 md:grid-cols-2">
              <div>
                  <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TITLE</label>
                  <input type="string" name="title" value="{{ old('title', $todo['title']) }}" id="first_name"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Title" required>
              </div>
              <div>
                  <label for="last_name"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CONTENT</label>
                  <input type="text" name="content" value="{{ old('content', $todo['content']) }}" id="last_name"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Content" required>
              </div>
              <button type="submit"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">UPDATE
                  TASK </button>
      </form>
      <div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ">
          Completed: {{$todo->completed_at ?? 'Not completed'}} 
      </div>
      <div>
          <input type="datetime-local" id="meeting-time" name="due_date" value="{{ old('due_date', $todo['due_date']) }}">
      </div>
      <form action="/todo/{{ $todo['id'] }}/completed " method="POST">
          @csrf
          @method('PATCH')
  
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded-full">
  
              completed
  
          </button>
      </form>
    
        
   
    </x-layouts.app>