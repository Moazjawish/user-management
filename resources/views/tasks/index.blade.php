<div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            <ul role="list" class="divide-y divide-gray-300 rounded-md border border-gray-200">

                @foreach($tasks as $task)
                @can('view-user-tasks' , $task)
                        <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm/6 ">
                            <div class="ml-4 grid  min-w-0 flex-1 gap-2">
                                <dt class="text-lg text-gray-900 block font-bold">{{$task->title}}</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0"> {{$task->description}}</dd>
                                    @if($task->users)
                                    <div class="flex flex-col  items-start space-x-4">
                                        <p class="font-bold">Users has task:</p>
                                        <img class=" w-7 h-7 rounded-full" src="{{asset('storage/'.$task->users->image)}}" alt="Jese Leos avatar" />
                                        <span class="font-medium dark:text-gray-400l">
                                            {{$task->users ? $task->users->first_name : 'No users Assigned' }}
                                        </span>
                                    </div>
                                    @endif

                            </div>
                            <div class="flex ">
                            <p class="flex-shrink-0 max-w-[95px] cursor-pointer text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-2.5 py-1 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" >{{$task->status}}</p>
                            @can('isAdmin', $task->users)
                            <div class="flex relative ml-3" x-data="{show: false}" x-on:click.away="show = false" >
                                <div >
                                    <button x-on:click="show = !show" type="button" class="max-w-xs text-white px-2 py-1 rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <p> options</p>
                                    </button>
                                </div>
                                <div x-show="show" class="origin-top-right absolute right-0 mt-10 w-22 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <a class="block px-4 py-2 text-sm text-gray-700"role="menuitem" tabindex="-1"   href="/projects/{{$project->id}}/tasks/{{$task->id}}/edit">Edit</a>
                                    <button type="submit" onclick="return confirm('Are you Sure to delete {{$task->title}}')"
                                    form="delete-form-{{$task->id}}" class="bg-white block px-4 py-2 text-sm text-gray-700">DELETE</button>
                                </div>
                            </div>
                            <!-- </div> -->
                            @endcan
                            <form method="post" action="/projects/{{$project->id}}/tasks/{{$task->id}}/delete" id="delete-form-{{$task->id}}" class="hidden">
                                @csrf
                                @method('delete')
                            </form>
                        </li>
                        @endcan
                        @endforeach
            </ul>
        </dd>
</div>
