<x-layout>
<x-slot:header>
        @section('title', 'Projects Table')
        @section('create_button')
        <a href="/projects/create" class="bg-gray-800 text-white rounded-md px-3 py-2 text-sm font-medium">CREATE PROJECT</a>
        @endsection
    </x-slot:header>
    {{$projects->links()}}
<div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
    <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
        <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-gray-900">Our Projects</h2>
        <p class="font-light text-gray-500 sm:text-xl dark:text-gray-600">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p>
    </div>

    <div class="grid gap-8 lg:grid-cols-1">
        @foreach($projects as $project)
        <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-5 text-gray-500">
                <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                    <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                    Tutorial
                </span>
                <span class="text-sm">{{$project->created_at}}</span>
            </div>
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">{{$project->title}}</a></h2>
            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{$project->description}}</p>
            <div class="flex justify-between items-center">
                <a href="/projects/{{$project->id}}" class="inline-flex items-center font-medium text-white dark:text-white bg-gray-700 p-2 rounded-lg hover:underline">
                    Project Details
                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </article>
        @endforeach
    </div>
<!--  -->
</div>

</x-layout>
