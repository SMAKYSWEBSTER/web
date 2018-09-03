<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMAK Yos Sudarso Batam</title>
        <meta name="description" content="Ini adalah webite resmi dari SMA Katolik Yos Sudarso Batam. Di website ini, kalian semua bisa mengetahui lebih banyak mengenai SMAK Yos Sudarso Batam. Website ini berisi konten seperti aktivitas-aktivitas sekolah, ekstrakurikuler, pengumuman, dan lain sebagainya. Bagi anda yang ingin mengetahui lebih detail tentang SMAK Yos Sudarso Batam silahkan klik link diatas. Terima Kasih!">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="/photos/vektoryos.png" rel="icon">
        {{-- App Stylesheets --}}
        <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>
    <body>
        @include('layouts.header')
        <div class="container">@yield('content')</div>
        @include('layouts.footer')
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>