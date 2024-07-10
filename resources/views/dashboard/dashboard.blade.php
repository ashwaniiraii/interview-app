@extends('layout.parent')
@section('space-work')
    <!-- Content -->
    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <div
                class=" relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                <div class="bg-gray-700 w-full px-6 py-8 ">
                    <div class="flex items-center justify-cente text-center flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 mb-5" viewBox="0 100 426.667 200">
                            <g fill="#fff">
                                <circle cx="42.667" cy="213.333" r="42.667" data-original="#000000" />
                                <circle cx="213.333" cy="213.333" r="42.667" data-original="#000000" />
                                <circle cx="384" cy="213.333" r="42.667" data-original="#000000" />
                            </g>
                        </svg>
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                            class="w-28 h-28 rounded-full" />
                        <div class="mt-5">
                            <h4 class="text-lg text-white font-bold">{{ auth()->user()->name }}</h4>
                            <p class="text-xs text-gray-300 mt-1">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">User</div>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                class="ri-more-fill"></i></button>
                        <ul
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="overflow-hidden">

                </div>
            </div>
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Profile</div>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                class="ri-more-fill"></i></button>
                        <ul
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <table class="w-full min-w-[540px]">

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection
