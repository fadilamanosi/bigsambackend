<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Laravel') }}
    </title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('livewire.layouts.header')
    @include('livewire.layouts.sidebar')

    <div class="p-4 sm:ml-64 ">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            {{ $slot }}

            @include('livewire.layouts.footer')

        </div>
    </div>


    @livewireScripts

</body>

</html>
