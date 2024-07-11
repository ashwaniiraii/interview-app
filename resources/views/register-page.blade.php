@extends('layout.comman-layout')
@section('work')
    <div class="flex flex-col justify-center font-[sans-serif] text-[#333] sm:h-screen md:h-full  p-4">
        <div class="max-w-md w-full  mx-auto border border-gray-300 rounded-md p-6 shadow-xl">
            <form action="{{ route('RegisterUser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-2">
                    <div>
                        <label class="text-sm mb-2 block">Name</label>
                        <input name="name" type="text"
                            class="bg-white border border-gray-300 w-full text-sm px-4 py-2 rounded-md outline-blue-500"
                            placeholder="Enter name" value="{{ old('name') }}" />
                        @error('name')
                            <div class="bg-red-100 border border-red-500 text-red-700 px-1 py-1 rounded relative mt-1">
                                <strong class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs">{{ $message }}</span>
                                </strong>
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-sm mb-2 block">Email</label>
                        <input name="email" type="email"
                            class="bg-white border border-gray-300 w-full text-sm px-4 py-2 rounded-md outline-blue-500"
                            placeholder="Enter email" value="{{ old('email') }}" />
                        @error('email')
                            <div class="bg-red-100 border border-red-500 text-red-700 px-1 py-1 rounded relative mt-1">
                                <strong class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs">{{ $message }}</span>
                                </strong>
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-sm mb-2 block">Department</label>
                        <input name="department" type="text"
                            class="bg-white border border-gray-300 w-full text-sm px-4 py-2 rounded-md outline-blue-500"
                            placeholder="Enter department" value="{{ old('department') }}" />
                        @error('department')
                            <div class="bg-red-100 border border-red-500 text-red-700 px-1 py-1 rounded relative mt-1">
                                <strong class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs">{{ $message }}</span>
                                </strong>
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-sm mb-2 block">Profile</label>
                        <input type="file" name="profile"
                            class="w-full text-gray-500 font-medium text-sm bg-gray-200 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-slate-700 file:hover:bg-slate-600 file:hover:text-white file:text-white rounded" />
                        @error('profile')
                            <div class="bg-red-100 border border-red-500 text-red-700 px-1 py-1 rounded relative mt-1">
                                <strong class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs">{{ $message }}</span>
                                </strong>
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-sm mb-2 block">Password</label>
                        <input name="password" type="password"
                            class="bg-white border border-gray-300 w-full text-sm px-4 py-2 rounded-md outline-blue-500"
                            placeholder="Enter password" />
                        @error('password')
                            <div class="bg-red-100 border border-red-500 text-red-700 px-1 py-1 rounded relative mt-1">
                                <strong class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs">{{ $message }}</span>
                                </strong>
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-sm mb-2 block">Confirm Password</label>
                        <input name="password_confirmation" type="password"
                            class="bg-white border border-gray-300 w-full text-sm px-4 py-2 rounded-md outline-blue-500"
                            placeholder="Enter confirm password" />
                        @error('password_confirmation')
                            <div class="bg-red-100 border border-red-500 text-red-700 px-1 py-1 rounded relative mt-1">
                                <strong class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs">{{ $message }}</span>
                                </strong>
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="!mt-6">
                    <button type="submit"
                        class="w-full py-2 px-4 text-sm font-semibold rounded text-white bg-slate-800 hover:bg-slate-700 focus:outline-none">
                        Create an account
                    </button>
                </div>
                <p class="text-sm mt-4 text-center">Already have an account? <a href="{{ route('login') }}"
                        class="text-slate-600 font-semibold hover:underline ml-1">Login here</a></p>
            </form>
        </div>
    </div>
@endsection
