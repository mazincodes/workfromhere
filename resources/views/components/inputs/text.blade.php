@props(['id', 'name', 'type' => 'text', 'label' => null, 'value' => '', 'placeholder' => '', 'required' => false])
<div class="mb-4">
    @if($label)
        <label class="block text-gray-700" for="{{$id}}">{{$label}}</label>
    @endif
    <input id="{{$id}}" type="{{$type}}" name="{{$name}}" {{$required ? 'required' : ''}} class="w-full px-4 py-2 border rounded focus:outline-none @error('title') border-red-500 @enderror" value="{{old($name, $value)}}" placeholder="{{$placeholder}}" />
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
        @enderror
</div>