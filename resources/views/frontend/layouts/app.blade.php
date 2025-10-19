<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Rs Kasih Sayang Ibu Hospital')</title>

        {{-- Link CSS dipisah di sini --}}
        @include('frontend.partials.links')
    </head>

    <body>

        {{-- Navbar (kalau ada) --}}
        @include('frontend.partials.navbar')

        {{-- Konten halaman --}}
        <main>
            @yield('content')
        </main>

        {{-- Footer (kalau ada) --}}
        @include('frontend.partials.footer')

        {{-- Script JS dipisah di sini --}}
        @include('frontend.partials.scripts')
    </body>

</html>
