<x-layouts.app>


<form action="/tags/{{ $tag['id'] }}" method="POST">
    @csrf
    @method('PATCH')
    <div class=" float-left gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="first_tags" class="block mb-2 text-sm font-medium text-gray-900"></label>
            <input type="text" name="tag"  value={{ old('tag', $tag['tag'])}}
                id="tag"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5"
                required>
        </div>
        <br>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center">
            Update Tags
        </button>
    </div>
</form>

</x-layouts.app>