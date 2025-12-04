@props(['heading' => 'Looking to hire?', 'subHeading' => 'Post your job listing now and find the perfect candidate.'])

<section class="container mx-auto my-auto">
    <div class="bg-linear-to-tl from-neutral-600 to-neutral-700 text-white p-10 m-4 rounded-[30%_5%_30%_5%] flex items-center justify-evenly flex-col md:flex-row gap-4">
        <div>
            <h2 class="text-[40px] font-semibold">{{$heading}}</h2>
            <p class="text-gray-200 text-lg mt-2">
                {{$subHeading}}
            </p>
        </div>
        <x-button-link url="/jobs/create" icon="edit" :active="request()->is('jobs/create')">
            Create Job
        </x-button-link>
    </div>
</section>