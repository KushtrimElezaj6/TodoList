
<x-layouts.app>
    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ route('todo.index') }}">

        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-2 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" id="default-search" name="search"
                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search Mockups, Logos..." required>
            <button type="submit"
                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    <h1 class="text-3xl font-bold dark:text-white   "> CREATE A TASK </h1>

    <x-layouts.create-post-form :priorities="$priorities"> </x-layouts.create-post-form>
    <div>
        <table class="min-w-full table-auto">
            <thead class="justify-between">
                <tr class="bg-gray-800">
                    <th class="px-16 py-2">
                        <span class="text-gray-300">Title</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-gray-300">Content</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-gray-300">Edit</span>
                    </th>

                    <th class="px-16 py-2">
                        <span class="text-gray-300">Delete</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-gray-300">DueDate</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-gray-300">Priority</span>
                    </th>
                </tr>
            </thead>
        
    </div>
    
      
    <tbody>
        @foreach ($todos as $todo)
            <tr class="bg-white border-4 border-gray-200">
                <td>{{ $todo['title'] }}</td>
                <td>{{ $todo['content'] }}</td>
          

                <td><a href="todo/edit/{{ $todo['id'] }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
                                mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 
                                focus:outline-none dark:focus:ring-blue-800">
                        Edit</a>
                    </a></td>
                <td>
                    <form action="/todo/{{ $todo['id'] }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 hover:bg-red-700 text-white  py-2 px-4 rounded-full">
                            Delete
                        </button>
                <td>{{ $todo['due_date'] }}</td>
                <td>{{ $todo['prioritiy'] }}</td>
                </form>
                </td>
            </tr>
            @endforeach 
    </tbody>
    </table>
    {{$todos->links() }}
    </div>
    </tbody>
    </table>
    </div>
</x-layouts.app>
