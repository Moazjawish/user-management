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
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0 ">{{$user->first_name  }} {{  $user->last_name}}</dd>
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
      <!-- <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
      <p class="text-lg m-4 font-bold  text-gray-900">Assigned Tasks</p>
      </div> -->

    </dl>
</div>

</div>
<div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <p class="text-lg p-4  font-bold  text-gray-900  mt-6 border-b border-gray-300">Assigned Tasks</p>
        </div>
        <div class="grid lg:grid-cols-2 gap-2 ">
            @if($user->tasks)
                    @foreach($user_tasks as $user_task)
                        <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">{{$user_task->title}}</a></h2>
                            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{$user_task->description}}</p>
                            <p class="flex-shrink-0 max-w-[95px]  text-white bg-red-700  font-medium rounded-full text-sm px-2.5 py-1  text-center me-2 mb-2 dark:bg-red-600 " >{{$user->tasks->get(0)->status}}</p>
                        </article>
                    @endforeach
                @endif
        </div>
    </div>
</x-layout>
