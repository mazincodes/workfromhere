<x-layout>
    <h1 class="text-3xl text-center m-8 text-gray-700">Bookmarked Jobs</h1>
    <div class="m-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            @forelse($bookmarks as $bookmark)
                <x-job-card :job="$bookmark"/>
            @empty
                <p class="text-2xl text-stone-700">You have no bookmarked job</p>
            @endforelse
        </div>
    </div>
</x-layout>