<form action="/todo" method="POST">
  @csrf
  <div class=" float-left gap-6 mb-6 md:grid-cols-2">
      <div>
          <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TITLE</label>
          <input type="string" name="title" value="{{ old('title') }}" id="first_name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Title" required>
      </div>
      <div>
          <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CONTENT</label>
          <input type="text" name="content" value="{{ old('content') }}" id="last_name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Content" required>
      </div>
          <h1 class="text-3xl font-italic dark:text-white   "> Choose a time </h1>    
  
      <input type="datetime-local" id="meeting-time" name="due_date" value="">
      <button type="submit"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">CREATE
          TASK </button>
</form>