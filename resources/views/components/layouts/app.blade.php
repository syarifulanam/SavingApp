<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savings App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="">
        {{-- {{ $slot }} adalah tempat di mana isi konten dari komponen Livewire atau Blade lain akan "disisipkan" ke dalam layout ini. --}}
        {{ $slot }}
    </div>
    <livewire:styles />
    @livewireScripts
</body>

</html>
