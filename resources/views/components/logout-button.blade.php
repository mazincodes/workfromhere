<form method="POST" action="{{route('logout')}}">
    @csrf
    <div class="flex justify-center">
        <button class="bg-[#e7e7e7] w-full text-center text-[17px] hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300 block rounded text-gray-600 m-1 px-4 py-2 cursor-pointer" type="submit"><i class="fa fa-sign-out"></i>Logout</button>
    </div>
</form>