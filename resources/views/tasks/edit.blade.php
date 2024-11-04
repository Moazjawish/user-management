<x-layout>
    @section('title', 'Edit Task')
    <form method="post" action="/projects/{{$project->id}}/tasks/{{$task->id}}/update" >
        @csrf
        @method('patch')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Task</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed privately.</p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <x-form-field>
                    <x-form-label for="title">Task title</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="title" id="title" value="{{old('title' , $task->title)}}"/>
                    </div>
                    <x-form-error name="title"/>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="description">Task description</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="description" id="description" value="{{old('description', $task->description)}}"/>
                    </div>
                    <x-form-error name="description"/>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="">Task Status</x-form-label>
                    <select name="status" class="mt-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($tasks as $task)
                            <option value="{{ $task->status }}"> {{ $task->status }} </option>
                        @endforeach
                    </select>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="">User to perform</x-form-label>
                    <select name="user_id" class="mt-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"> {{ $user->first_name }}  {{ $user->last_name }}/  <span class="!text-gray-600 font-size-[20px] !bg-gray-600">{{$user->position}}</span> </option>
                        @endforeach
                    </select>
                </x-form-field>

            </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/projects/{{$project->id}}" class="text-sm font-semibold leading-6 text-gray-900">CANCEL</a>
            <x-submit-button href="/projects/{{$project->id}}/tasks/{{$task->id}}/update">UPDATE TASK</x-submit-button>
        </div>
    </form>
</x-layout>
