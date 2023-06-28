<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased">

    <div id="transparent" class="fixed top-0 right-0 w-full h-full text-2xl">

        <div class="relative p-4  h-full flex flex-col justify-center ">
            <!-- Modal content -->
            <div class="flex justify-center">
                @if ($status == 'success')
                    <div class="relative p-4 text-center bg-white rounded-lg shadow  sm:p-5 w-[30%]  ">
                        <div
                            class="w-12 h-12 rounded-full bg-green-100  p-2 flex items-center justify-center mx-auto mb-3.5">
                            <svg aria-hidden="true" class="w-8 h-8 text-green-500 " fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Success</span>
                        </div>
                        <p class="mb-4 text-lg font-semibold text-gray-900 grid">
                            <span>
                                Successfully booked your ticket.
                            </span>
                            <span>
                                This is your ticket number : <b class="text-[red]">8669823:3</b>
                            </span>
                        </p>
                        <a 
                            class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                            Go home
                        </a>
                    </div>
                @else
                    <div class="relative p-4 text-center bg-white rounded-lg shadow  sm:p-5 w-[30%]  ">
                        <div
                            class="w-12 h-12 rounded-full bg-red-100  p-2 flex items-center justify-center mx-auto mb-3.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="red"
                                class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                            </svg>
                            <span class="sr-only">Success</span>
                        </div>
                        <p class="mb-4 text-lg font-semibold text-gray-900 ">
                          Payment failed.


                        </p>
                        <a 
                            class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                            Go home
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        #transparent {
            background-color: #0000009e;
        }
    </style>

</body>

</html>
