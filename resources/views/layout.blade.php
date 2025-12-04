<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
    integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>{{$title ?? 'workfromhere | Find and list jobs'}}</title>
</head>
<body>
    <x-header />
    @if(request()->is('/'))
        <x-hero/>
        <x-top-banner/>
    @endif

    <main>
        @if(session('success'))
            <x-alert type="success" message="{{session('success')}}"/>
        @endif
        @if(session('error'))
            <x-alert type="error" message="{{session('error')}}"/>
        @endif
        {{$slot}}
    </main>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>