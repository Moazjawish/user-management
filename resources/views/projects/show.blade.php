<x-layout>
    <x-slot:header>
        @section('title','Project Details')
        @section('create_button')
        <x-edit-button href="/projects/{{$project->id}}/tasks" class="bg-gray-800 text-white rounded-md px-3 py-2 text-sm font-medium">ADD TASKS</x-edit-button>
        @endsection
    </x-slot:header>
    <div>
  <div class="px-4 sm:px-0 flex justify-between items-center">
    <div>
        <h3 class="text-base/7 font-semibold text-gray-900">Applicant Information</h3>
        <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Personal details and application.</p>
    </div>
    <div>
    @can('isAdmin' )
    <a href="/projects/{{$project->id}}/edit" class="bg-gray-800 text-white rounded-md px-3 py-2 text-sm font-medium">EDIT PROJECT</a>
    <x-submit-button onclick="return confirm('Are you Sure to delete {{$project->title}}')"
    form="delete-form-{{$project->id}}" class="bg-red-700 hover:bg-red-500">DELETE</x-submit-button>
    @endcan
            <form method="post" action="/projects/{{$project->id}}/delete" id="delete-form-{{$project->id}}" class="hidden">
                @csrf
                @method('delete')
            </form>

    </div>
  </div>
  <div class="mt-6 border-t border-gray-300">
    <dl class="divide-y divide-gray-300">
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900">Project title</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0 font-bold">{{$project->title}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900">About</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$project->description}}</dd>
      </div>
    </dl>
</div>
<div class="px-4 mt-10 sm:px-0">
    <h3 class="text-base/7 font-bold  text-gray-900">Project Realted Tasks</h3>
</div>
@if($project->tasks)
    @include('tasks.index', ['tasks' => $project->tasks])
@else
    <p>No Related Tasks</p>
@endif
<x-edit-button href="/projects" class="text-sm font-semibold leading-6 text-white bg-gray-900">BACK</x-edit-button>
</div>

</x-layout>
