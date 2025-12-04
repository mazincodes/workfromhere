@props(['url' => '/', 'icon' => null, 'colorClass', 'active' => null])

<div class="flex justify-center">
    <a href="{{$url}}" class="{{$active ? $colorClass : 'bg-[#e7e7e7] text-gray-600'}} w-full text-center m-1 text-[17px] hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300 block px-4 py-2 rounded">
        @if($icon)
            <i class="fa fa-{{$icon}}"></i>
        @endif
        {{$slot}}
    </a>
</div>