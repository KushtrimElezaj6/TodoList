
<div class="w-full  h-full flex flex-col justify-center mt-10 items-center gap-6 mb-10 pb-2">
    
    <form action="{{ route('tags.index') }}" class="w-1/4">
        <div class="flex flex-row justify-center gap-2 items-center">
                  
                    <input type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full  "
                        placeholder="Search" required>
            
            <button type="submit"
            class=" p-2 text-sm font-medium  text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
         
          Search
        </button>
    
    </div>
   
   
</form>

<form action="/tags" method="POST" class="w-1/4">
    @csrf
 
    <div class="flex flex-col justify-start gap-2 items-center">

            <input type="text" name="tag" placeholder="enter your tags" value="{{ old('tag') }}"
                id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full"

                required>
                <button type="submit"
                class=" p-2 text-sm font-medium  text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">

                CREATE TAGS
            </button>
      
    </div>
</form>

</div>