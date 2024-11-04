<x-layout>
    @section('title', 'Edit Project')

    <form method="post" action="/projects/{{$project->id}}/update" >
        @csrf
        @method('patch')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Update Project</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed privately.</p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">

                <x-form-field>
                    <x-form-label for="title">Project Title</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="title" id="title" value="{{old('title',$project->title)}}"/>
                    </div>
                    <x-form-error name="title"/>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="description">Project Description</x-form-label>
                    <div class="mt-2">
                        <textarea name="description" id="description"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >{{old('description', $project->description)}}</textarea>
                    </div>
                    <x-form-error name="description"/>
                </x-form-field>

            </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/projects/{{$project->id}}" class="text-sm font-semibold leading-6 text-gray-900">CANCEL</a>
            <x-submit-button href="/projects/{{$project->id}}/update">UPDATE PROJECT</x-submit-button>
        </div>
    </form>
</x-layout>
