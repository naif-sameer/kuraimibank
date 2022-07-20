<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  dir="{{ str_replace('_', '-', app()->getLocale()) === 'ar' ? 'rtl' : 'ltr' }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/font.min.css') }}">

  <!-- Scripts -->
  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
  @include('layouts.web.navigation')

  @yield('content')

  @include('layouts.web.footer')

  {{-- TODO --}}
  <script src="https://cdn.jsdelivr.net/gh/naif-sameer/tokyo-lorem@master/dist/lorem-lib.umd.js"></script>

  <script src="{{ asset('js/slider.js') }}"></script>
  @yield('script')
  @stack('script')
</body>

</html>
