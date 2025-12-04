@if($paginator->hasPages())
    <nav class="flex justify-center m-4" role="navigation">
        {{-- previous page --}}
        @if($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-800">Previous</span>
        @else
            <a class="px-4 py-2 bg-gray-700 text-white rounded-l-lg shadow" href="{{$paginator->previousPageUrl()}}">Previous</a>
        @endif

        {{-- pagination elements --}}
        @foreach($elements as $element)
            @if(is_string($element))
                <span class="px-4 py-2 bg-gray-400 text-gray-600">{{$element}}</span>
            @endif
            {{-- array of links --}}
            @if(is_array($element))
                @foreach ($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <span class="px-4 py-2 bg-gray-500 text-white">{{$page}}</span>
                    @else
                        <a class="px-4 py-2 bg-gray-400 text-gray-800" href="{{$url}}">{{$page}}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

         {{-- next page --}}
        @if($paginator->hasMorePages())
            <a class="px-4 py-2 bg-gray-700 text-white rounded-r-lg shadow" href="{{$paginator->nextPageUrl()}}">Next</a>
        @else
            <span class="text-gray-800 px-4 py-2">Next</span>
        @endif
    </nav>
@endif
