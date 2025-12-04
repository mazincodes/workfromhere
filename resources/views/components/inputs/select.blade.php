@props(['id', 'name', 'label', 'value' => '', 'placeholder' => '', 'options' => []])

<div class="mb-4">
    <label class="block text-gray-700" for="{{$name}}">{{$label}}</label>
    <select id="{{$id}}" name="{{$name}}" class="w-full px-4 py-2 border rounded focus:outline-none">
        @foreach($options as $optionValue => &$optionLabel)
            <option value="{{$optionValue}}" {{old($name, $value) == $optionValue ? 'selected' : ''}}>{{$optionLabel}}</option>
        @endforeach
    </select>
</div>