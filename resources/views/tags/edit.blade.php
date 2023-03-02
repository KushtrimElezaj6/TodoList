<x-layouts.app>


<form action="/tags/{{ $tag['id'] }}" method="POST">
    @csrf
    @method('PATCH')
    <div class=" w-full flex flex-col justify-center items-center gap-6 mt-10">
        <div class="w-1/4 flex flex-col gap-1">
            <label for="first_tags" class="block  text-sm font-medium text-blue-700 font-serif tracking-wider ">Tag</label>
            <input type="text" name="tag"  value={{ old('tag', $tag['tag'])}}
                id="tag"
                placeholder="Update your tag..."
                class="pl-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5"
                required>
                
        </div>
        <button type="submit"
            class="text-white w-1/5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-md font-serif px-5 py-2.5 text-center tracking-widest">
            Update Tags
        </button>
    </div>
</form>

</x-layouts.app>