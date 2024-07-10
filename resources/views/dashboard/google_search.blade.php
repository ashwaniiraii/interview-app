@extends('layout.parent')
@section('space-work')
    <div class="p-8 mt-6 rounded-lg shadow-xl bg-white w-full max-w-md mx-auto">
        <h1 class="text-2xl font-semibold mb-4 text-center">Search</h1>
        @if (session('message'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-1 rounded relative mb-4" role="alert">
                <strong class="font-bold text-xs ">Error!</strong>
                <span class="block sm:inline text-xs">{{ session('message') }}</span>
            </div>
        @endif
        <form action="{{ route('search') }}" method="GET">
            <div class="relative flex items-center border border-gray-300 rounded-full overflow-hidden">
                <input type="text" name="query" placeholder="Search Here"
                    class="py-2 px-4 w-full focus:outline-none bg-transparent text-lg font-medium" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" class="w-6 h-6 text-gray-400 absolute right-4 top-1/2 transform -translate-y-1/2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <div class="flex mt-4">
                <button type="submit"
                    class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white py-2 px-4 rounded-l-full transition duration-300 shadow-md">Search</button>
                <a href="{{ route('google.search') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-600 py-2 px-4 rounded-r-full transition duration-300 shadow-md">Clear</a>
            </div>
        </form>
    </div>

    <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">

        @if (isset($results['items']))
            <ul class="list-none mb-4">
                @foreach ($results['items'] as $item)
                    <li class="mb-4 pb-4 border-b border-slate-600">
                        <a href="{{ $item['link'] }}" target="_blank"
                            class="text-blue-600 hover:text-blue-900 transition duration-300 ease-in-out">
                            <h2 class="text-lg font-bold">{{ $item['title'] }}</h2>
                        </a>
                        <p class="text-gray-600 text-sm">{{ $item['snippet'] }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
