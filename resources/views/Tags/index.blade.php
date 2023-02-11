<x-layouts.app>

    <x-layouts.create-todo-form> </x-layouts.create-todo-form>
    <div>
        <table class="min-w-full  ml-2 mr-2 table-auto">
            <thead class="justify-between">
                <tr class="bg-gray-800">
                    <th class=" ">
                        <span class="text-gray-300  ">TAGS</span>
                    </th>
                    <th class="px-16 py-2 ">
                        <span class="text-gray-300">Edit</span>
                    </th>

                    <th class="px-16 py-2">
                        <span class="text-gray-300 ">Delete</span>
                    </th>
                </tr>
            </thead>
    </div>
    <tbody>
        @foreach ($tags as $tag)
            <tr class="bg-white border-4 border-gray-200">
                <td>{{ $tag['tag'] }}</td>



                <td><a href="tags/edit/{{ $tag['id'] }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-2.5 
                                    mr-2 mb-2 
                                    focus:outline-none">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="/tags/{{ $tag['id'] }}" method="POST">
                        @method('DELETE')
                        @csrf

                        <button class="bg-red-500 hover:bg-red-700 text-white ml-9  py-2 px-3 rounded-full">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>

    </table>
    {{ $tags->links() }}

</x-layouts.app>
