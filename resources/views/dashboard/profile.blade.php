@extends('layout.parent')
@section('space-work')
    <section class="max-w-full mx-auto p-4 pt-6 rounded">
        <section class="bg-gray-200 p-4 pt-6">
            <div class="container mx-auto p-4 pt-6">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full lg:w-1/4 xl:w-1/4 p-4">
                        <div class="bg-white rounded shadow-md p-4 pt-6">
                            <div class="text-center">
                                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                    class="rounded-full w-32 h-32 mx-auto">
                                <h5 class="my-3">{{ auth()->user()->name }}</h5>
                                <p class="text-gray-600 mb-1">Tech</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-3/4 xl:w-3/4 p-4">
                        <div class="bg-white rounded shadow-md p-4 pt-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg">Profile</h3>
                                <button class="bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-800"
                                    onclick="openModal()">Edit</button>
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="py-4">
                                    <div class="flex justify-between items-center">
                                        <p class="text-gray-600">Full Name</p>
                                        <p class="text-gray-600">{{ auth()->user()->name }}</p>
                                    </div>
                                </div>
                                <div class="py-4">
                                    <div class="flex justify-between items-center">
                                        <p class="text-gray-600">Email</p>
                                        <p class="text-gray-600">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                <!--... -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6 mt-6 w-full max-w-md">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-lg font-semibold">Edit Profile</h4>
                            <button
                                class="text-gray-600 bg-zinc-500 w-8 text-[20px] rounded-md text-white hover:bg-stone-400"
                                onclick="closeModal()">&times;</button>
                        </div>
                        <form id="update-profile-form" action="{{ route('profile.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <label for="name" class="block text-gray-700 font-bold mb-2">Full Name</label>
                                <div class="relative">
                                    <input type="text" id="name" name="name"
                                        class="w-full pl-4 pr-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                        value="{{ auth()->user()->name }}" required>
                                    <p class="text-gray-500 text-xs mt-1">Leave same to keep current name</p>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email"
                                        class="w-full pl-4 pr-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                        value="{{ auth()->user()->email }}" required>
                                    <p class="text-gray-500 text-xs mt-1">Leave same to keep current email</p>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="profile_picture" class="block text-gray-700 font-bold mb-2">Profile
                                    Picture</label>
                                <div class="relative">
                                    <input type="file" id="profile_picture" name="profile_picture"
                                        class="w-full pl-4 pr-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                </div>
                                <p class="text-gray-500 text-xs mt-1">Leave blank to keep current profile & Max file size:
                                    2MB</p>
                            </div>

                            <div class="mb-2">
                                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="w-full pl-4 pr-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" ">
                                            </div>
                                            <p class="text-gray-500 text-xs mt-1">Leave blank to keep current password</p>
                                        </div>

                                        <div class="flex justify-end mt-2">
                                            <button type="button"
                                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded mr-2"
                                                onclick="closeModal()">Cancel</button>
                                            <button type="submit"
                                                class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </section>
                </section>
                <script>
                    $(document).ready(function() {
                        $('#update-profile-form').submit(function(event) {
                            event.preventDefault();
                            var formData = new FormData(this);
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('profile.update') }}',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    if (data.success) {
                                        closeModal();
                                        location.reload();
                                    } else {
                                        alert('Error updating profile');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    alert('Error updating profile: ' + error);
                                }
                            });
                        });
                    });

                    function closeModal() {
                        $('#editModal').addClass('hidden');
                    }
                </script>
                <script>
                    function openModal() {
                        document.getElementById('editModal').classList.remove('hidden');
                    }

                    function closeModal() {
                        document.getElementById('editModal').classList.add('hidden');
                    }
                </script>
@endsection
