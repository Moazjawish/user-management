<x-layout>
    <x-slot:header>
        @section('title', 'Users Table')
        @section('create_button')
        <a href="/users/create" class="bg-gray-800 text-white rounded-md px-3 py-2 text-sm font-medium">ADD USER</a>
        @endsection
    </x-slot:header>

    {{$users->links()}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-auto ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-gray-900 whitespace-nowrap dark:text-white">
                    Full Name
                </th>
                <!--  -->
                <!--  -->
                <th scope="col" class="px-6 py-3 text-center text-gray-900 whitespace-nowrap dark:text-white">
                    Position
                </th>
                <!--  -->
                <th scope="col" class="px-6 py-3 text-center text-gray-900 whitespace-nowrap dark:text-white ">
                    Image
                </th>
                <!--  -->
                <th scope="col" class="px-6 py-3 text-center text-gray-900 whitespace-nowrap dark:text-white">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @if($user->role == 'user')
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700  ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                            {{$user->first_name}} {{$user->last_name}}
                        </th>
                        <!--  -->
                        <td  class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white flex justify-center">
                            {{$user->position}}
                        </td>
                        <!--  -->
                        <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="max-width-20px flex justify-center">
                            <img src="{{ asset($user->image) }}" alt="" class="rounded-full aspect-square object-cover" width="90px" height="90px"  >
                            </div>
                        </td>
                        <!--  -->
                        <td class="px-6 py-4 text-right space-x-2 flex flex-wrap justify-center">
                            <x-edit-button href="/users/{{$user->id}}/edit">UPDATE</x-edit-button>
                            <!--  -->
                            <x-submit-button onclick="return confirm('Are you Sure to delete {{$user->first_name}}')"
                            form="delete-form-{{$user->id}}" class="bg-red-700 hover:bg-red-500">DELETE</x-submit-button>
                            <!--  -->
                            <x-edit-button class="bg-blue-900 hover:bg-blue-200 " href="/users/{{$user->id}}">VIEW</x-edit-button>
                            <!--  -->
                            <!-- onclick="event.preventDefault(); document.getElementById('delete-form-{{$user->id}}').submit();" -->
                            <form method="post" action="/users/{{$user->id}}/delete" id="delete-form-{{$user->id}}" class="hidden">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
            @endif
            @endforeach
        </tbody>
    </table>

</div>

    </x-layout>
