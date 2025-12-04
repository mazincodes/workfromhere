@props(['url', 'active', 'icon' => null, 'mobile' => null])

@if($mobile)
    <a href="{{$url}}" class="block {{$active ? 'text-gray-600 font-bold' : 'text-gray-700'}} text-center text-[17px] px-4 py-2">
        @if($icon)
            <i class="fa fa-{{$icon}}"></i>
        @endif
        {{$slot}}
    </a>
@else
    <a href="{{$url}}" class="block {{$active ? 'text-gray-700 font-bold' : 'text-gray-600'}} text-center text-[17px] px-4 py-2">
        @if($icon)
            <i class="fa fa-{{$icon}}"></i>
        @endif
        {{$slot}}
    </a>
@endif