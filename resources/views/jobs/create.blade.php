<x-layout>
    <x-slot:title>Create Job</x-slot>
    <div class="bg-white mx-auto p-8 m-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold text-neutral-700">Create Job Listing</h2>
        <form method="POST" action="/jobs" enctype="multipart/form-data">
            @csrf

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-600">Job Info</h2>

            <x-inputs.text id="title" name="title" label="Job Title" placeholder="Software Engineer"/>

            <x-inputs.text-area id="description" label="Description" name="description" placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..." />
            
            <x-inputs.text id="salary" name="salary" type="number" label="Salary" placeholder="50000"/>
            
            <x-inputs.text-area id="requirements" label="Requirements" name="requirements" placeholder="Bachelor's degree in Computer Science" />
            
            <x-inputs.text-area id="benefits" label="Benefits" name="benefits" placeholder="Health insurance, 401k, paid time off" />
                
            <x-inputs.text id="tags" name="tags" label="Tags (comma-separated)" placeholder="development,coding,java,python"/>

            <x-inputs.select id="job_type" name="job_type" label="Job Type" value="{{old('job_type')}}" :options="['Full-Time' => 'Full-Time', 'Part-Time' => 'Part-Time', 'Contract' => 'Contract', 'Volunteer' => 'Volunteer', 'Temporary' => 'Temporary', 'Internship' => 'Internship', 'On-Call' => 'On-Call']" />

            <x-inputs.select id="remote" name="remote" label="Remote" value="{{old('remote')}}" :options="[false => 'No', true => 'Yes']" />
            
            <x-inputs.text id="address" name="address" label="Address" placeholder="123 Main St"/>
                

            <x-inputs.text id="city" name="city" label="City" placeholder="Albany"/>
            
            <x-inputs.text id="state" name="state" label="State" placeholder="NY"/>

            <x-inputs.text id="zipcode" name="zipcode" label="Zipcode" placeholder="12201"/>
            

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Company Info</h2>

            <x-inputs.text id="company_name" name="company_name" label="Company Name" placeholder="Enter Company Name"/>
            
            <x-inputs.text-area id="company_description" label="Company Description" name="company_description" placeholder="Enter Company Description" />

            <x-inputs.text id="company_website" name="company_website" type="url" label="Company Website" placeholder="Enter Company Website Url"/>
            
            <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone" placeholder="Enter Phone"/>
            
            <x-inputs.text id="contact_email" type="email" name="contact_email" label="Contact Email" placeholder="Email where you want to receive applications"/>

            <div class="mb-4">
                <label class="block text-gray-700" for="company_logo"
                    >Company Logo</label
                >
                <input
                    id="company_logo"
                    type="file"
                    name="company_logo"
                    class="w-full px-4 py-2 border rounded focus:outline-none @error('company_logo') border-red-500 @enderror"
                />
                @error('company_logo')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
                </div>

            <button
                type="submit"
                class="bg-[#4ba75c] w-full text-white cursor-pointer text-center text-[17px] block rounded px-4 py-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300 font-semibold"
            >
                Save
            </button>
        </form>
    </div>
</x-layout>