<x-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 m-10">
        @forelse($jobs as $job)
            <x-job-card :job="$job"></x-job-card>
        @empty
            <li>No jobs available!</li>
        @endforelse
    </div>
    <div class="flex justify-center">
        {{$jobs->links()}}
    </div>
</x-layout>