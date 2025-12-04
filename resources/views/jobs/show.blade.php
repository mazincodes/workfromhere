<x-layout>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 m-6">
        <section class="lg:col-span-3">
            <div class="rounded-lg shadow-md bg-white p-3">
                <div class="flex justify-between items-center">
                    <a class="block p-4 text-white bg-gray-600 rounded hover:scale-103 hover:bg-gray-500 hover:shadow duration-200" href="/jobs"><i class="fa fa-left-long"></i> Back To Listings</a>
                    @can('update', $job)
                        <div class="flex space-x-3 ml-4">
                            <a href="{{route('jobs.edit', $job->id)}}" class="bg-[#e7e7e7] w-full m-1 text-center text-[17px] block rounded text-gray-600 px-4 py-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300">Edit</a>
                            <!-- Delete Form -->
                            <form method="POST" action="{{route('jobs.destroy', $job->id)}}" 
                            onsubmit="return confirm('Are you sure you want to delete this job?')">
                            @csrf
                            @method('DELETE')
                                <button
                                    type="submit"
                                    class="bg-[#c53b3b] w-full m-1 text-center text-[17px] block rounded text-white px-4 py-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300 cursor-pointer"
                                >Delete
                                </button>
                            </form>
                            <!-- End Delete Form -->
                        </div>
                    @endcan
                </div>
                <div class="p-4 bg-white">
                    <h2 class="text-xl text-gray-700 font-semibold">
                        {{$job->title}}
                    </h2>
                    <p class="text-gray-700 text-lg mt-2">
                        {{$job->description}}
                    </p>
                    <ul class="my-4 bg-stone-100 p-4">
                        <li class="mb-2">
                            <strong class="text-gray-700">Job Type:</strong> {{$job->job_type}}
                        </li>
                        <li class="mb-2">
                            <strong class="text-gray-700">Remote:</strong> {{$job->remote ? 'Yes' : 'No'}}
                        </li>
                        <li class="mb-2">
                            <strong class="text-gray-700">Salary:</strong> ₹{{$job->salary}}
                        </li>
                        <li class="mb-2">
                            <strong class="text-gray-700">Site Location:</strong> {{$job->city}}, {{$job->state}}
                        </li>
                        <li class="mb-2">
                            <strong class="text-gray-700">Tags:</strong> {{ucwords(str_replace(',', ', ',$job->tags))}}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container mx-auto my-4 p-8 bg-[#272638] rounded-lg">
                @if($job->requirements || $job->benefits)
                    <h2 class="text-xl font-semibold mb-4 text-[#cecece]">Job Details</h2>
                    <div class="rounded-lg bg-[#272638] p-4">
                        <h3 class="text-lg font-semibold mb-2 text-[#cecece]">Job Requirements</h3>
                        <p class="text-[#cecece]">{{$job->requirements}}</p>
                        <h3 class="text-lg font-semibold mt-4 mb-2 text-[#cecece]">Benefits</h3>
                        <p class="text-[#cecece]">{{$job->benefits}}</p>
                    </div>
                @endif

                @auth
                    <p class="my-5 text-[#dfdfdf]">
                        Put "Job Application" as the subject of your email
                        and attach your resume.
                    </p>

                    <div x-data="{ open: false }">
                        <div x-cloak x-show="open" class="fixed z-20 top-0 left-0 w-full h-full flex justify-center items-center bg-black/70">
                            <div @click.away="open = false" class="modal bg-white w-[80%] h-[600px] overflow-scroll px-6 py-4 rounded-2xl shadow-2xl">
                                <h1 class="text-stone-700 font-semibold">Apply for {{$job->title}}</h1>
                                <form method="POST" enctype="multipart/form-data" action="{{route('applicant.store', $job->id)}}">
                                    @csrf
                                    <x-inputs.text name="full_name" label="Full Name" id="full_name" :required="true" />
                                    <x-inputs.text name="contact_email" label="Contact Email" id="contact_email" :required="true" />
                                    <x-inputs.text name="contact_phone" label="Contact Phone" id="contact_phone" :required="true" />
                                    <x-inputs.text-area name="message" label="Message" id="message" />
                                    <x-inputs.text name="location" label="Location" id="location" />
                                    <label for="resume" class="text-gray-700">Upload your resume (PDF)</label>
                                        <input
                                            id="resume"
                                            type="file"
                                            name="resume"
                                            required
                                            class="w-full px-4 py-2 my-2 border rounded focus:outline-none"
                                        />
                                    <button type="submit" class="shadow rounded-2xl bg-[#272638] hover:bg-gray-700 cursor-pointer duration-300 text-white px-4 py-2">Submit Application</button>
                                    <button @click="open = false" type="submit" class="shadow rounded-2xl bg-gray-500 hover:bg-gray-400 cursor-pointer duration-300 text-white px-4 py-2">Cancel</button>
                                </form>
                            </div>
                        </div>
                        <div class="relative z-10 bottom-6 my-8">
                            <button @click="open = true" class="absolute bg-[#4ba75c] w-full text-white cursor-pointer text-center text-[17px] block rounded px-4 py-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300 font-semibold">Apply Now</button>
                        </div>
                    </div>
                @else
                    <p class="bg-gray-400 text-gray-800 text-[17px] rounded-2xl m-2 px-6 py-4">
                        <i class="fas fa-info-circle mr-2"></i>You must be logged in to apply for this job
                    </p>
                @endauth

                {{-- <a href="mailto:{{$job->contact_email}}" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                    Apply Now
                </a> --}}
            </div>
        </section>

        <aside class="rounded-lg shadow-md p-8 bg-slate-800 my-4">
            <h3 class="text-xl text-center mb-4 font-bold text-[#cecece]">Company Info</h3>
            @if($job->company_logo)
                <div class="bg-white w-[250px] lg:w-[150px] xl:w-[250px] mb-4 rounded-full mx-auto">
                    <img src="/storage/{{$job->company_logo}}" alt="logo" class="p-8"/>
                </div>
            @endif
            <h4 class="text-lg font-bold text-[#cecece]">{{$job->company_name}}</h4>
            @if($job->company_description)
                <p class="text-[#cecece] text-lg my-3">
                    {{$job->company_description}}
                </p>
            @endif
            @if($job->company_website)
                <a
                    href="{{$job->company_website}}"
                    target="_blank"
                    class="text-white bg-gray-600 rounded p-2 my-4 inline-block hover:scale-103 hover:bg-gray-500 hover:shadow duration-200"
                    >Visit Website</a
                >
            @endif
            
            {{-- Bookmark button --}}
            @guest
            <p class="bg-gray-400 text-gray-800 text-[14px] rounded-2xl m-1 px-4 py-2">
                <i class="fas fa-info-circle mr-2"></i>
                You must be logged in to bookmark a job
            </p>
            @else
            <form method="POST" action="{{auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists() ? route('bookmarks.destroy', $job->id) : route('bookmarks.store', $job->id)}}">
                @csrf
                @if(auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists())
                @method('DELETE')
                    <button class="mt-10 bg-gray-500 hover:bg-stone-700 duration-200 text-white hover:text-red-300 cursor-pointer font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
                        <i class="fas fa-bookmark mr-3"></i>
                        Remove Bookmark
                    </button>
                @else
                    <button class="mt-10 bg-gray-500 hover:bg-stone-700 duration-200 text-white hover:text-red-300 cursor-pointer font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
                        <i class="fas fa-bookmark mr-3"></i>
                        Bookmark Listing
                    </button>
                @endif
                </form>
            @endguest
        </aside>
    </div>
</x-layout>