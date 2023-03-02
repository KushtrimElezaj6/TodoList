@props(['href'])

<a href="{{ $href }}"
    class="inline-flex items-center border-b-2 {{ request()->is(ltrim($href, '/') . '*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-white tracking-wider font-serif' }} px-1 pt-1 text-sm font-medium hover:border-gray-300 hover:text-black">
    {{ $slot }}
</a>