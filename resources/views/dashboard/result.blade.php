@extends('layout.parent')
@section('space-work')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Search for Images</h1>
        <form action="{{ route('search.results') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <input type="text" name="query" placeholder="Search term" required
                    class="w-full p-3 pl-10 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg class="w-5 h-5 absolute left-3 top-3 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <div class="text-center">
                <button type="submit"
                    class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-4 py-2 rounded-md hover:from-purple-700 hover:to-blue-700">
                    Search
                </button>
            </div>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if (isset($error))
                <p class="text-red-500">{{ $error }}</p>
            @elseif(isset($data['hits']) && count($data['hits']) > 0)
                @foreach ($data['hits'] as $hit)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        @if (isset($hit['videos']))
                            <video width="320" height="240" controls class="w-full rounded-md">
                                <source src="{{ $hit['videos']['medium']['url'] }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ $hit['webformatURL'] }}" alt="{{ $hit['tags'] }}" class="w-full rounded-md">
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
