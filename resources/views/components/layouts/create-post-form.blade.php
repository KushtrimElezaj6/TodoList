@props(['priorities'])
@props(['tags'])
@props(['projects'])

<form action="/todo" method="POST">
    @csrf
    <div class="flex flex-col gap-4 items-start justify-start w-full">
        <div class="w-full flex flex-col gap-1">
            <label for="first_name" class="w-full block text-md font-medium text-blue-700 tracking-wider">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" id="first_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5"
                placeholder="Write title here..." required>
        </div>
        <div class="w-full flex flex-col gap-1" >
            <label for="last_name" class="w-full block text-md font-medium text-blue-700 tracking-wider">Content</label>
            <input type="text" name="content" value="{{ old('content') }}" id="last_name"
                class="bg-gray-50 w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5"
                placeholder="Write content here..." required>
        </div>
       

        <div class="w-full flex flex-col gap-1">
            <label for="priority" class=" block text-md font-medium text-blue-700 font-serif tracking-wider">Select option
            </label>
            <select id="priority" name="priority" 
                class="bg-gray-50 w-full border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5">
                <option class="hidden text-gray-300" value="" disabled selected>Select your priority
                </option>
                @foreach ($priorities as $priority)
                    <option class="border-red-500">{{ $priority }}</option>
                @endforeach
               
            </select>
        </div>

        <div class="w-full flex flex-col gap-1">
            <label for="tag" class="mb-0.3 block text-md font-medium text-blue-700 tracking-wider font-serif">Select Tags
            </label>
            <select id="select" name="tags[]" multiple
                class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker">
                <option class="hidden" disabled selected> Select your Tags
                </option>
            <
        

                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>

            @endforeach
            </select>
        </div>

            <div class="w-full flex flex-col gap-1">
                <label for="project" class="block mb-2 text-md font-medium text-blue-700 font-serif tracking-wider dark:text-white">Select
                    Project</label>
                <select id="project" name="project_id"  
                class="shadow appearance-none border rounded-md w-full py-2 px-3 mr-4 mb-2 text-grey-darker">
                     <option selected disabled> Choose project </option>
                     @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->title }}</option>

            @endforeach
                     
                   

                </select>
            </div> 
               
            </select>
        </div>
        <p class=" text-md font-medium text-blue-700 font-serif tracking-wider dark:text-white"> Choose a time </p>

        <input type="datetime-local" id="meeting-time" name="due_date" value="">
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-md  sm:w-auto px-5 py-2.5 text-center font-serif tracking-wider">Create
            task </button>
    </div>
</form>
