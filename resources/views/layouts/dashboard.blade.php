<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body class="antialiased" style="font-family: 'Roboto', sans-serif;">
    <div class="flex">
        @include('dashboard::layouts.sidebar')

        <div class="w-full bg-gray-100">
            @include('dashboard::layouts.navbar')

            <div class="flex items-center w-full px-24 my-6 ">
                @yield('content')
            </div>

        </div>
    </div>
</body>

</html>