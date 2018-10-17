<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMAK Yos Sudarso Batam</title>
        <meta name="keywords" content="smak yos sudarso batam, sma yos sudarso batam,smak yos sudarso,  sma yos sudarso, smakys, sma katolik yos sudarso batam, edufair smakys 2018, edufair smakys">
        <meta name="google-site-verification" content="cm2XFOhor3Dc4tO4axdEGWYnwBeIspXfhA_wlsRMMDk" />
        <meta name="description" content="Ini adalah website resmi dari SMA Katolik Yos Sudarso Batam. Di website ini, kalian semua bisa mengetahui lebih banyak mengenai SMAK Yos Sudarso Batam. Website ini berisi konten seperti aktivitas-aktivitas sekolah, ekstrakurikuler, pengumuman, dan lain sebagainya. Bagi anda yang ingin mengetahui lebih detail tentang SMAK Yos Sudarso Batam silahkan klik link diatas. Terima Kasih!">
        <meta name="google-site-verification" content="Bcu0lXUO-488qPc6tmsbpEX1MMRxgtgb9RDH14ukjCM" />
        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114906629-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-114906629-1');
        </script>
        
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