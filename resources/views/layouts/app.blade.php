<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/dashboard.js') }}" defer></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen bg-gray-100">
    <!-- Page sidebar -->
    @include('layouts.dashboard.sidebar')


    <!-- Page Heading -->

    <!-- Page Content -->
    <main>
      <!-- Page Navbar -->
      @include('layouts.dashboard.navigation')

      @yield('content')
    </main>
  </div>
</body>

</html>
