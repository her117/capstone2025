<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <title>Home</title>
</head>
<body>
    <x-nav-bar></x-nav-bar>
    <div class="p-4 sm:ml-64">
        <x-header>{{ $title }}</x-header>
        <main>
            {{ $slot }}
        </main>
    </div>
<script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
