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
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-800">
    <x-navigation />
    <div class="container mx-auto p-3">
        <article class="max-w-xl px-6 py-24 mx-auto space-y-12 bg-gray-800 text-gray-50">
            <div class="w-full mx-auto space-y-4 text-center">
                <p class="text-xs font-semibold tracking-wider uppercase">Shopperly</p>
                <h1 class="text-4xl font-bold leading-tight md:text-5xl">Mayden Tech Test</h1>
    
            </div>
            <div class="text-gray-100 ">
             

            <h2 class="mb-2 text-lg font-semibold text-gray-900 text-white">Application Features:</h2>
            <ul class="max-w-md space-y-1 text-gray-500 list-none list-inside text-gray-400">
                <li>Add Items</li>
                <li>Remove Items</li>
                <li>Cross Items Off The List</li>
                <li>Total Up Item Price</li>
                <li>Spend Limit</li>
                <li>Share Your List Via Email</li>
                <li>Password Protected List, Saved To Your Profile</li>

                
            </ul>
            <br>
            <h2 class="mb-2 text-lg font-semibold text-gray-900 text-white">Testing:</h2>
            <ul class="max-w-md space-y-1 text-gray-500 list-none list-inside text-gray-400">
                <li>Run multiple tests using php artisan test</li>
            </ul>
     

            </div>
            


        </article>
    </div>

    <x-footer />

</body>

</html>
