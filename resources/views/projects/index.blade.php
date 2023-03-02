 <x-layouts.app>
     @if (Session::has('message'))
         {{ Session::get('message') }}
     @endif

     @if ($errors->any())
         @foreach ($errors->all() as $error)
             <div>{{ $error }}</div>
         @endforeach
     @endif


        <form action="/projects" method="POST">
         @csrf


         <div class="w-screen flex flex-col justify-center items-center bg-gray-50  px-4 mb-20 sm:px-6 lg:px-8">
             <div class="max-w-md w-full flex flex-col gap-4">
                 <div>
                     
                     <h2 class="mt-6 text-center text-3xl font-bold text-blue-700 font-serif">
                         Create Project
                     </h2>
                 </div>

                     <div class="w-full flex flex-col gap-4 mb-10 tracking-wider">
                             <div class="flex flex-col gap-1  w-full">
                                 <label for="first_name" class="block text-md font-medium text-blue-700 font-serif">Title</label>
                                 <input type="text" name="title" value="{{ old('title') }}" id="first_name"
                                 autocomplete="given-name"
                                   
                                     class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg w-full focus:ring-blue-500
                                     block p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     placeholder="Write the title here..." required>
                             </div>

                             <div class="flex flex-col gap-1  w-full">

                                 <label for="last_name" class="block text-md font-medium text-blue-700 font-serif">Content</label>
                                 <input type="text" name="content" value="{{ old('content') }}" id="last_name"
                                     placeholder="Write here the content..."
                                     class="bg-gray-50  border-2 border-gray-300 text-gray-900 text-sm rounded-lg w-full focus:ring-blue-500
                                        block p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     required>
                             </div>
                             <button type="submit"
                             class="tracking-widest relative w-full flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                             Create Project
                         </button>
                     </div>
             </div>

                        
    </form>


    <table class="w-screen  mx-10  table-auto flex flex-col">
        <thead class="w-full px-10">
            <tr class="bg-sky-800 w-full flex flex-row justify-around tracking-widest">
                <th class="justify-center p-2">
                    <span class="text-white font-serif  ">Title</span>
                </th>
                <th class="justify-center p-2">
                    <span class="text-white font-serif ">Content</span>
                </th>
                <th class="justify-center p-2">
                    <span class="text-white font-serif">Edit</span>
                </th>

                <th class="justify-center p-2">
                    <span class="text-white font-serif ">Delete</span>
                </th>
              
            </tr>
        </thead>
             <tbody class=" w-full px-10 ">
                 @foreach ($projects as $project)
                     <tr class=" border-4 border-gray w-full  flex flex-row justify-around tracking-wider font-serif ">
                         <td class="flex justify-center items-center w-full">{{ $project['title'] }}</td>
                         <td class="flex justify-center items-center w-full">{{ $project['content'] }}</td>
                        <td class="flex justify-center items-center w-full"><a href="/projects/edit/{{ $project['id'] }}" 
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-2.5 focus:outline-none"> Edit</a>
                         </a></td>

                        <td class="flex justify-center items-center w-full">
                         <form action="/projects/{{ $project['id'] }}" method="POST">
                         @csrf
                         @method('DELETE')

                         <button class="bg-red-500 hover:bg-red-700 text-white  py-2 px-4 rounded-lg">
                             Delete
                         </button>
                         </form>
                         @endforeach
                     </tr>

             </tbody>
         </table>

 </x-layouts.app>
