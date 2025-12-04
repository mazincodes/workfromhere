<x-layout>
    <section class="flex flex-col lg:flex-row">
        {{-- profile --}}
        <div class="flex flex-col justify-center items-center bg-white m-10 rounded-2xl lg:w-[50%] p-6 h-auto">
            <h1 class="text-3xl text-neutral-700 p-8 text-center">My Profile</h1>
            <div class="flex justify-center">
                @if(Auth::user()->avatar)
                    <img class="w-32 h-32 rounded-full" src="{{asset('storage/' . Auth::user()->avatar)}}" alt="{{Auth::user()->name}}">
                @else
                    <img class="w-32 h-32 rounded-full" src="{{asset('storage/avatars/default.png')}}" alt="{{Auth::user()->name}}">
                @endif
            </div>

            <form class="w-full" method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-inputs.text id="name" type="text" label="Name" name="name" value="{{$user->name}}" placeholder="Enter your name"/>
                <x-inputs.text id="email" type="email" label="Email" name="email" value="{{$user->email}}" placeholder="Enter email"/>
                <label class="block text-gray-700" for="avatar">Upload Avatar</label>
                <input class="w-full px-4 py-2 border rounded focus:outline-none my-2" type="file" name="avatar" id="avatar">
                <button type="submit" class="bg-[#4ba75c] w-full text-white cursor-pointer text-center text-[17px] block rounded px-4 py-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300 font-semibold" href="">Save</button>
            </form>
        </div>
        
        
        <div class="bg-slate-800 m-10 rounded-2xl p-10 lg:w-[50%] h-auto">
            <h1 class="text-3xl text-[#cecece] p-8 text-center">My Job Listings</h1>
            <div class="grid grid-cols-2 gap-4">
                @forelse ($jobs as $job)
                <div class="justify-self-start mt-10">
                    <h1 class="text-xl font-semibold text-[#cecece]">{{$job->title}}</h1>
                    <p class="text-sm text-[#c5c5c5]">{{$job->job_type}}</p>
                    
                    {{-- applicants --}}
                    <div class="mt-4 bg-stone-100 shadow p-6 rounded">
                        <h3 class="text-neutral-700 font-semibold">Applicants</h3>
                        @forelse($job->applicants as $applicant)
                        <div class="my-2 text-gray-800">
                            <p class="text-[14px]"><strong class="text-gray-700">Name: </strong>{{$applicant->full_name}}</p>
                        </div>
                        <div class="my-2 text-gray-800">
                            <p class="text-[14px]"><strong class="text-gray-700">Contact: </strong>{{$applicant->contact_phone}}</p>
                        </div>
                        <div class="my-2 text-gray-800">
                            <p class="text-[14px]"><strong class="text-gray-700">Email: </strong>{{$applicant->contact_email}}</p>
                        </div>
                        <div class="my-2 text-gray-800">
                            <p class="text-[14px]"><strong class="text-gray-700">Message: </strong>{{$applicant->message}}</p>
                        </div>
                        <div class="my-2 text-gray-800">
                            <p class="text-[14px]"><strong class="text-gray-700">Location: </strong>{{$applicant->location}}</p>
                        </div>
                        <div class="my-2">
                            <p class="text-[14px]"><a class="text-white bg-gray-600 rounded p-2 inline-block hover:scale-101 hover:bg-gray-500 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] duration-200" download href="{{asset('storage/' . $applicant->resume_path)}}"><i class="fas fa-download"></i> Download Resume</a></p>
                        </div>
                        {{-- delete applicants --}}

                        <form method="POST" action="{{route('applicant.destroy', $applicant->id)}}" onsubmit="return confirm('Are you sure you want to delete this applicant?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-[#c53b3b] text-center text-[14px] block rounded text-white p-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-200 cursor-pointer">
                                <i class="fas fa-trash"></i>Delete Applicant
                            </button>
                        </form>
                    
                        @empty
                            <p class="text-gray-700">No applicants for this job</p>
                        @endforelse
                    </div>

                            
                </div>
                <div class="justify-self-end mt-10">
                    <div class="flex gap-5">
                        <a class="bg-[#e7e7e7] w-full m-1 text-center text-[17px] block rounded text-gray-600 px-4 py-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-200" href="{{route('jobs.edit', $job->id)}}">Edit</a>
                        <form method="POST" action="{{route('jobs.destroy', $job->id)}}?from=dashboard" 
                        onsubmit="return confirm('Are you sure you want to delete this job?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-[#c53b3b] w-full m-1 text-center text-[17px] block rounded text-white px-4 py-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300 cursor-pointer">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
            <div class="flex justify-center items-center w-[210%]">
                <p class="text-xl text-gray-700">You don't have job listings :(</p>
            </div>
                {{-- <p class="justify-items-center"></p> --}}
            @endforelse
        </div>
    </div>
</section>
</x-layout>