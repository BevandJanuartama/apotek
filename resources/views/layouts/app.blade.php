<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Apotek')</title>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Konten Halaman --}}
    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

    {{-- SweetAlert --}}
    @include('sweetalert::alert')

</body>
</html>
