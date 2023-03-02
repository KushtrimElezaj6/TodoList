<x-layouts.app>

    <x-layouts.create-todo-form> </x-layouts.create-todo-form>
    
        <table class="w-screen  mx-2 table-auto ">
            <thead class="w-full flex flex-row justify-around ">
                <tr class="bg-gray-800 w-full flex flex-row justify-around">
                    <th class="justify-center p-2">
                        <span class="text-gray-300  ">TAGS</span>
                    </th>
                    <th class="justify-center p-2">
                        <span class="text-gray-300">Edit</span>
                    </th>

                    <th class="justify-center p-2">
                        <span class="text-gray-300 ">Delete</span>
                    </th>
                </tr>
            </thead>
    <tbody>
        @foreach ($tags as $tag)
            <tr class="bg-white border-4 border-gray-200 w-full  flex flex-row justify-around">
                <td class="flex justify-center items-center w-full">{{ $tag['tag'] }}</td>



                <td class="flex justify-center items-center w-full">
                    <a href="tags/edit/{{ $tag['id'] }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-2.5 focus:outline-none">
                        Edit
                    </a>
                </td>
                <td class="flex justify-center items-center w-full ">
                    <form action="/tags/{{ $tag['id'] }}" method="POST">
                        @method('DELETE')
                        @csrf

                        <button class="bg-red-500 hover:bg-red-700 text-white   py-2 px-3 rounded-full">
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
