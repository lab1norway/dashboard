<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href=" {{ asset('vendor/dashboard/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body class="antialiased" style="font-family: 'Roboto', sans-serif;">
    <body class="bg-white">
        <div class="container mx-auto h-screen">
            <div class="flex">
                <div class="flex-1">
                    @yield('content')
                </div>
            </div>
        </div>
        @yield('scripts')
    </body>
</body>

</html>
