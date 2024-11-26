<x-layout>
@section('title', 'User Details')
@section('create_button')
        <x-edit-button href="/users" class="text-sm font-semibold leading-6 text-white bg-gray-900">BACK</x-edit-button>
        @endsection

<div class="grid gap-8 lg:grid-cols-2 items-start">
<div class="">
        <img src="{{ asset($user->image) }}" alt="" class="rounded-full aspect-square object-cover "  width="350px" height="450px"  >
    </div>

  <div class="mt-6 border-t border-gray-300">
    <dl class="divide-y divide-gray-300">
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900">Full name</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->first_name}}{{$user->last_name}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900">Application for</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->position}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900">Email address</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->email}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900">Salary</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->salary}}$ USD</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900">About</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900">Assigned Tasks</dt>
        @if($user->tasks)
        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            <ul role="list" class="divide-y divide-gray-300 rounded-md border border-gray-200">
                @foreach($user_tasks as $user_task)
                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm/6">
                        <div class="flex w-0 flex-1 items-center">
                            <div class="ml-4 grid  min-w-0 flex-1 gap-2">
                                <dt class="text-sm/6 font-medium text-gray-900 block">{{$user_task->title}}</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0"> {{$user_task->description}}</dd>
                            </div>
                            <p class="flex-shrink-0 max-w-[95px] cursor-pointer text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-2.5 py-1 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" >{{$user->tasks->get(0)->status}}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
            @else
        </dd>
        <p>No Attached tasks</p>
        @endif
        </div>
    </dl>
    </div>
</div>

</x-layout>
