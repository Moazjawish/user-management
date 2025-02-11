<x-layout>
    @section('title', 'Edit User')
    <form method="post" action="/users/{{$user->id}}/update" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Update user information</h2>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <x-form-field>
                    <x-form-label for="first_name">First name</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="first_name" id="first_name" value="{{old('first_name', $user->first_name)}}"/>
                    </div>
                    <x-form-error name="first_name"/>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="last_name">Last name</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="last_name" id="last_name" value="{{old('last_name', $user->last_name)}}"/>
                    </div>
                    <x-form-error name="last_name"/>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="email">Email</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="email" id="email" value="{{old('email', $user->email)}}"/>
                    </div>
                    <x-form-error name="email"/>
                </x-form-field>
                <x-form-field>
                    <!--  -->
                    <x-form-label for="position">Position</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="position" id="position" value="{{old('position', $user->position)}}"/>
                    </div>
                    <x-form-error name="position"/>
                </x-form-field>
                <!--  -->
                <x-form-field>
                    <x-form-label for="salary">Salary</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="salary" id="salary" value="{{old('salary', $user->salary)}}"/>
                    </div>
                    <x-form-error name="salary"/>
                </x-form-field>
                <!--  -->
                <x-form-field class="sm:!col-span-4 ">
                    <x-form-label >Cover photo</x-form-label>
                    <div class="mt-2 flex justify-around rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center flex items-center flex-col gap-2">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <x-form-label  for="image" class="!relative !cursor-pointer !rounded-md !bg-white !font-semibold !text-indigo-600 !focus-within:outline-none !focus-within:ring-2 !focus-within:ring-indigo-600 !focus-within:ring-offset-2 !hover:text-indigo-500">
                                    <span class="p-2">Upload a file</span>
                                    <x-form-input name="image" id="image" type="file" accept="image/*" class="!sr-only" onchange="previewImage(event)"/>
                                </x-form-label>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                            <div class="mt-2 flex justify-center">
                                <img id="imagePreview" src="{{ $user->image ? asset('storage/'.$user->image) : '' }}" alt="`" class="rounded-full aspect-square object-cover" width="200px" height="200px">
                            </div>
                        </div>
                    <x-form-error name="image"/>

                    </x-form-field>
            </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/users/ " class="text-sm font-semibold leading-6 text-gray-900">CANCEL</a>
            <x-submit-button href="/users/{{$user->id}}/update">UPDATE</x-submit-button>
        </div>
    </form>
</x-layout>
<script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.classList.remove('hidden');
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
