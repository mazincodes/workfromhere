<x-layout>
    <div class="hero relative w-full h-screen flex justify-center items-center">
        <div class="overlay"></div>
        <div class="z-10 bg-white w-[600px] m-4 p-10 rounded flex flex-col justify-center items-center shadow-[0_0_3px_0_rgba(0,0,0,0.5)]">
            <h1 class="text-2xl my-2 text-gray-700">Register</h1>
            <form action="{{route('register.store')}}" method="post">
                @csrf
                <input class="w-full px-4 py-2 my-2 border border-stone-300 rounded focus:outline-none {@error('title') border-red-500 @enderror}" id="name" type="text" name="name" value="{{old('name')}}" placeholder="Full name"/>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
                <input class="w-full px-4 py-2 my-2 border border-stone-300 rounded focus:outline-none {@error('title') border-red-500 @enderror}" id="email" type="email" name="email" value="{{old('email')}}" placeholder="Enter email"/>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
                <input class="w-full px-4 py-2 my-2 border border-stone-300 rounded focus:outline-none {@error('title') border-red-500 @enderror}" id="password" type="password" name="password" value="{{old('password')}}" placeholder="Enter password"/>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
                <input class="w-full px-4 py-2 my-2 border border-stone-300 rounded focus:outline-none {@error('title') border-red-500 @enderror}" id="password_confirmation" type="password" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Confirm password"/>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
                <button type="submit" class="bg-gray-600 hover:bg-neutral-700 hover:shadow hover:scale-101 duration-200 m-1 w-full cursor-pointer text-center text-[17px] block rounded text-white px-4 py-2">Submit</button>

                <div class="flex gap-2 justify-center my-4">
                    <p class="text-neutral-600">Already have an account?</p>
                    <a class="text-gray-600" href="{{route('login.authenticate')}}">Login</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>