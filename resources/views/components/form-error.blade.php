@props(['name' ])
@error($name)
    <div class="alert alert-danger text-red-500">{{ $message }}</div>
@enderror
