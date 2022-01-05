<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Theses.fr</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    @livewireStyles
</head>
<body class="bg-white font-sans">
    <nav class="fixed w-full bg-white z-10 shadow">
        <div class="flex flex-wrap py-3 w-full max-w-4xl items-center justify-between">
            <div class="">
                <ul class="flex flex-wrap">
                    <li class="mr-8">
                        <a href="{{ URL::route('index') }}">
                            <img src="{{ asset('storage/theses.gif') }}" alt="logo de theses.fr" class="h-6 ml-2">
                        </a>
                    </li>
                    <li class="mr-8 border-b-2 border-transparent hover:text-gray-800 hover:border-blue-500">
                        <a href="{{ URL::route('graphiques') }}">Graphiques</a>
                    </li>
                    <li class="mr-8 border-b-2 border-transparent hover:text-gray-800 hover:border-blue-500">
                        <a href="{{ URL::route('carte') }}">Carte</a>
                    </li>
                    <li class="mr-8 border-b-2 border-transparent hover:text-gray-800 hover:border-blue-500">
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
