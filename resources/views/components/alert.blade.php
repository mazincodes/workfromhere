@props(['type', 'message'])

@if(session()->has($type))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert mx-auto mt-2 fixed md:top-[0%] top-[0%] left-0 right-0 text-white w-[30%] text-sm px-4 py-2 rounded-lg {{$type === 'success' ? 'bg-green-500' : 'bg-red-500'}}">   
    {{$message}}
</div>
@endif