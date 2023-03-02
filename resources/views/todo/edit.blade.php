<x-layouts.app>



    @if (Session::has('message'))
    <div class="flex flex-row-reverse justify-end mt-10 ">
        <div class="bg-white rounded-lg shadow-lg p-6 mx-auto animate-slide-up border border-green-300">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                <div class="text-green-500 text-2xl">{{ Session::get('message') }}</div>
            </div>
        </div>
    </div>
@endif

@if ($errors->has('update_id'))
    <div class="flex flex-row-reverse justify-end mt-10 ">
        <div class="bg-white rounded-lg shadow-lg p-6 mx-auto animate-slide-up borders border-red-300">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                <div class="text-red-500">{{ $errors->first('update_id') }}</div>
            </div>
        </div>
    </div>
@endif


    <div class="flex flex-col w-full justify-center items-center mb-8">
    <h1 class="mt-10 font-serif text-5xl"> Edit your task </h1>
    </div>
   
    <form action="/todo/{{ $todo['id'] }}" method="POST" >
        @csrf
        @method('PATCH')
        <div class="flex flex-col w-full justify-center items-center gap-4 mb-14">
            <div  class="flex flex-col w-1/4 gap-1">

                <label for="first_name" class="block  text-sm font-medium text-gray-900">TITLE</label>
                <input type="string" name="title" value="{{ old('title', $todo['title']) }}" id="first_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                    placeholder="Title" required>
            </div>
            <div  class="flex flex-col w-1/4 gap-1">
                <label for="last_name" class="block text-sm font-medium text-gray-900">CONTENT</label>
                <input type="text" name="content" value="{{ old('content', $todo['content']) }}" id="last_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                    placeholder="Content" required>
            </div>

        <input class="flex flex-row w-1/4 gap-4" type="datetime-local" id="meeting-time" name="due_date" value="{{ old('due_date', $todo['due_date']) }}">
        <div class="flex flex-col w-1/4 gap-1" >
            <label for="priority" class="mb-0.5 block text-sm font-medium text-gray-700">Select an
                option
                <select id="priority" name="priority"
                    class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-700">
                    <option class="hidden" value="{{ old('priority', $todo['priority']) }}" disabled selected>Select your
                        priority
                    </option>
                    @foreach ($priorities as $priority)
                        <option>{{ $priority }}</option>
                    @endforeach
                </select>
            </label>
        </div>
    
        <div class="flex flex-col w-1/4 gap-1" >
            <label for="tag" class="mb-0.3 block text-sm font-medium text-gray-600">Select Tags
            </label>
            <select id="tag" name="tags[]" multiple
                class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker">
                <option class="hidden" value="{{ old('tag', $todo['tag']) }}" disabled selected> Select your Tags
                </option>
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}" @if(in_array($tag->id,$tagIds ))  selected @endif>
    
                        {{ $tag->tag }}
                    </option>
                @endforeach
                
            </select>
        </div>
        <div class="flex flex-col w-1/4 gap-4">
            <div class="w-full justify-between gap-4 flex flex-row" >
        <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center">
        UPDATE TASK
    </button>
    
    <button type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center">
       

        Completed

    </button>
</div>
    
        <form action="/todo/{{ $todo['id'] }}/completed " method="POST">
            @csrf
            @method('PATCH')

            <div class="bg-blue-500 hover:bg-red-700 text-white w-full  py-2 px-2 rounded-full">
                Completed: {{ $todo->completed_at ?? 'Not completed' }}
            </div>

           
        </form>


</div>

    </div>
    

   

</form>

      
       



</x-layouts.app>
