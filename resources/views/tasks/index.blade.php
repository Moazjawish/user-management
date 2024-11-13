
<div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
<dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
          <ul role="list" class="divide-y divide-gray-300 rounded-md border border-gray-200">
              @foreach($tasks as $task)
              @can('view-user-tasks', $task)

          <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm/6">
              <div class="flex w-0 flex-1 items-center">
                <div class="ml-4 grid  min-w-0 flex-1 gap-2">
                  <dt class="text-sm/6 font-medium text-gray-900 block">{{$task->title}}</dt>
                  <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0"> {{$task->description}}</dd>

                  @if($task->users )
                <div class="flex flex-col  items-start space-x-4">
                    <p class="font-bold">Users has task:</p>
                    <img class=" w-7 h-7 rounded-full" src="{{$task->users->image}}" alt="Jese Leos avatar" />
                    <span class="font-medium dark:text-gray-400l">
                    {{$task->users ? $task->users->first_name : 'No users Assigned' }}
                    </span>
                </div>
                @endif


            </div>
            <p class="flex-shrink-0 max-w-[95px] cursor-pointer text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-2.5 py-1 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" >{{$task->status}}</p>
            @can('isAdmin', $task->users)
            <x-edit-button class="bg-blue-900 hover:bg-blue-200 " href="/projects/{{$project->id}}/tasks/{{$task->id}}/edit">Edit</x-edit-button>
            <x-submit-button onclick="return confirm('Are you Sure to delete {{$task->title}}')"
            form="delete-form-{{$task->id}}" class="bg-red-700 hover:bg-red-500">DELETE</x-submit-button>
            @endcan
            <form method="post" action="/projects/{{$project->id}}/tasks/{{$task->id}}/delete" id="delete-form-{{$task->id}}" class="hidden">
                @csrf
                @method('delete')
            </form>
        </li>
        @endcan()
        @endforeach
        </ul>
        </dd>
      </div>
