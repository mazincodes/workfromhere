@props(['job'])

<div class="rounded-lg shadow-md bg-white p-4">
    <div class="flex items-center space-between gap-4">
        @if($job->company_logo)
            <img src="Storage/{{$job->company_logo}}" alt="Ad" class="w-14 h-14"/>
        @endif
        
        <div>
            <h2 class="text-xl text-gray-700 font-semibold">
                {{$job->title}}
            </h2>
            <p class="text-sm text-gray-500">{{$job->job_type}}</p>
        </div>
    </div>
    <p class="text-gray-700 text-lg mt-2">
        {{$job->description}}
    </p>
    <ul class="my-4 bg-stone-100 p-4 rounded">
        <li class="mb-2"><strong class="text-gray-700">Salary:</strong> ₹{{$job->salary}}</li>
        <li class="mb-2">
            <strong class="text-gray-700">Location:</strong> {{$job->address}}, {{$job->city}}, {{$job->state}}
            @if($job->remote)
                <span
                    class="text-xs bg-green-400 text-white rounded-full px-2 py-1 ml-2"
                    >Remote</span
                >
            @else
                <span
                    class="text-xs bg-red-400 text-white rounded-full px-2 py-1 ml-2"
                    >On-site</span
                >
            @endif
        </li>
        @if($job->tags)
            <li class="mb-2">
                <strong class="text-gray-700">Tags:</strong> <span>{{ucwords(str_replace(',', ', ',$job->tags))}}</span>
            </li>
        @endif
    </ul>
    <a
        href="{{route('jobs.show', $job->id)}}"
        class="bg-neutral-700 w-full m-1 text-center text-[17px] block rounded text-white px-5 py-3 hover:bg-neutral-600 hover:shadow-[0_0_8px_0_rgba(0,0,0,0.4)] hover:scale-102 duration-200">Details</a>
</div>