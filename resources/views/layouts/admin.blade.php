<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Dashboard') }}</title>

    <x-admin.styles />

    {{ $style }}
</head>

<body>

    <x-admin.navbar />

    <div class="container-fluid">
        <div class="row m-0">

            <x-admin.sidebar />

            <main id="main" class="col-md-12 mr-sm-auto col-lg-10 px-md-4 pt-5 text-right"><br>

                {{ $slot }}

            </main>
        </div>
    </div>

    <x-admin.scripts />

    {{ $script }}

</body>
</html>
