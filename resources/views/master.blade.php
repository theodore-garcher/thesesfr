<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('titre')</title>
    @livewireStyles
</head>
<body class="bg-white font-sans">
    <nav class="fixed w-full bg-white z-10 shadow">
        <div class="flex flex-wrap py-3 mx-auto w-full max-w-4xl items-center justify-between">
            <div class="">
                <ul class="flex flex-wrap">
                    <li class="mr-8">
                        <a href="{{ URL::route('index') }}">Index</a>
                    </li>
                    <li class="mr-8">
                        <a href="{{ URL::route('index.import') }}">Import</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="pt-20">

        @yield('content')
    </div>
@livewireScripts
</body>
</html>
