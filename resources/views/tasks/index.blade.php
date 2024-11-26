                <div class="py-8 px-4 ml-0 max-w-[800px] lg:py-16 lg:px-6">
                    <div class="grid gap-8 lg:grid-cols-1">
                @foreach($tasks as $task)
                @can('view-user-tasks' , $task)
                <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <div class="bg-primary-100 text-primary-800 text-xs font-medium items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                            <p class="text-white text-lg font-bold">Users has task:</p>
                            <div class="mt-3 gap-2 inline-flex items-center">
                            <a href="/users/{{$task->users->id}}" class="inline-flex gap-2 text-center items-center">
                            <img class=" w-7 h-7 rounded-full" src="{{asset('storage/'.$task->users->image)}}" alt="Jese Leos avatar" />
                                <p class="font-medium dark:text-gray-400l">
                                    {{$task->users ? $task->users->first_name : 'No users Assigned' }}
                                </p>
                                </a>
                            </div>
                        </div>
                        @can('isAdmin', $task->users)
                            <div class="flex relative ml-3" x-data="{show: false}" x-on:click.away="show = false" >
                                <div >
                                    <button x-on:click="show = !show" type="button" class="max-w-xs text-white px-2 py-1 rounded-full bg-gray-800 text-sm focus:outline-none " id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <p class="bg-gray-700 px-2 py-1 rounded-lg">options</p>
                                    </button>
                                </div>
                                <div x-show="show" class="origin-top-right absolute right-0 mt-10 w-22 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <a class="block px-4 py-2 text-sm text-gray-700"role="menuitem" tabindex="-1"   href="/projects/{{$project->id}}/tasks/{{$task->id}}/edit">Edit</a>
                                    <button type="submit" onclick="return confirm('Are you Sure to delete {{$task->title}}')"
                                    form="delete-form-{{$task->id}}" class="bg-white block px-4 py-2 text-sm text-gray-700">DELETE</button>
                                </div>
                            </div>
                        @endcan
                        <form method="post" action="/projects/{{$project->id}}/tasks/{{$task->id}}/delete" id="delete-form-{{$task->id}}" class="hidden">
                            @csrf
                            @method('delete')
                        </form>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">{{$task->title}}</a></h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{$task->description}}</p>
                    <p class="flex-shrink-0 max-w-[95px] cursor-pointer text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-2.5 py-1 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" >{{$task->status}}</p>

                </article>
                @endcan
                @endforeach
            </div>
</div>

