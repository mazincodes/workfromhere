<form method="GET" action="{{route('jobs.search')}}" class="block mx-5 space-y-2 md:mx-auto md:space-x-2">
    @csrf
    <input
        type="text"
        name="title"
        placeholder="Job Title"
        class="w-full md:w-72 px-4 py-3 focus:outline-none bg-white rounded-[5px]"
    />
    <input
        type="text"
        name="location"
        placeholder="Location"
        class="w-full md:w-72 px-4 py-3 focus:outline-none bg-white rounded-[5px]"
    />
    <button type="submit" class="w-full cursor-pointer md:w-auto bg-stone-200 hover:bg-stone-300 text-stone-800 hover:scale-105 hover:text-stone-900 duration-200 px-4 py-3 rounded-[5px] focus:outline-none">
        <i class="fa fa-search mr-1"></i> Search
    </button>
</form>