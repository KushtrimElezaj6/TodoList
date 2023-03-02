<x-layouts.app>


    <form action="/projects/{{ $project->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class=" w-full flex flex-col justify-center items-center gap-6 mt-10">
            <div class="w-1/4 flex flex-col gap-4 justify-center">
                <div class="w-full flex flex-col gap-1">

            
                <label for="first_tags" class="block  text-md font-medium text-blue-700 font-serif tracking-wider">Title</label>
                <input type="text" name="title"  value={{ old('title', $project['title'])}}
                    id="projects"
                    placeholder="Update title..."
                    class="pl-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5"
                    required>
                </div>
                    <div class="w-full flex flex-col gap-1">
                    <label for="first_tags" class="block  text-md font-medium text-blue-700 font-serif tracking-wider">Content</label>
                    <input type="text" name="content"  value={{ old('content', $project['content'])}}
                        id="projects"
                        placeholder="Update content..."
                        class="pl-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5"
                        required>
                    </div>
                    </div>
           
            <button type="submit"
                class="text-white font-serif tracking-widest bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center">
                Update project
            </button>
        </div>
    </form>
    
    </x-layouts.app>