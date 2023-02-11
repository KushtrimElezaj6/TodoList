<x-layouts.app>




    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    @if ($errors->has('update_id'))
        {{ $errors->first('update_id') }}
    @endif

    <h1> Edit your task </h1>
    <br><br>
    </form>
    <form action="/todo/{{ $todo['id'] }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>

                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">TITLE</label>
                <input type="string" name="title" value="{{ old('title', $todo['title']) }}" id="first_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                    placeholder="Title" required>
            </div>
            <br>
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">CONTENT</label>
                <input type="text" name="content" value="{{ old('content', $todo['content']) }}" id="last_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                    placeholder="Content" required>
            </div>

    </form>
    <br>
    <div>
        <input type="datetime-local" id="meeting-time" name="due_date" value="{{ old('due_date', $todo['due_date']) }}">
    </div>
    <br>
    </div>
    </div>
    <div class="flex-1">
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

    <div class="flex-1">
        <label for="tag" class="mb-0.3 block text-sm font-medium text-gray-600">Select Tags
        </label>
        <select id="tag" name="tags[]" multiple
            class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker">
            <option class="hidden" value="{{ old('tag', $todo['tag']) }}"selected> Select your Tags
            </option>
            @foreach ($todo->tags as $tag)
                <option value="">

                    {{ $tag->tag }}
                </option>
            @endforeach

        </select>
        <form action="/todo/{{ $todo['id'] }}/completed " method="POST">
            @csrf
            @method('PATCH')

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded-full">

                completed

            </button>
            <br><br>
            <div class="bg-blue-500 hover:bg-red-700 text-white  py-2 px-4 rounded-full">
                Completed: {{ $todo->completed_at ?? 'Not completed' }}
            </div>
            <br>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center">
                UPDATE TASK
            </button>
            <br><br>
        </form>




</x-layouts.app>
