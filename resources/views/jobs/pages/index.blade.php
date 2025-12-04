<x-layout>
    <h2 class="text-3xl text-stone-200 my-10 mx-auto p-4 bg-stone-700 text-center">Welcome to WorkFromHere</h2>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 m-10">
        @forelse($jobs as $job)
        <x-job-card :job="$job"></x-job-card>
        @empty
        <li>No jobs available!</li>
        @endforelse
    </div>
        <a class="px-6 py-3 bg-neutral-600 text-white rounded hover:scale-102 text-[17px] hover:bg-neutral-700 duration-200 block text-center w-[150px] hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:text-white mx-auto" href="{{url('/jobs')}}">All Jobs</a>
    <x-bottom-banner/>
</x-layout>