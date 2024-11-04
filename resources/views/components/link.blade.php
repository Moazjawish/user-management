@props(['active' => false])
<a class=" {{$active ? 'bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium'
:'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white'}}"
aria-current="{{ $active ? 'page' : null }}"
{{$attributes}}
>{{$slot}}</a>
