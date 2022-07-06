<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!------ vite ------>
  @vite(['resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">

  <div class="grid min-h-screen bg-gray-100 md:grid-cols-2">
    <!-- Page sidebar -->
    @include('layouts.dashboard.sidebar')

    <!-- Page Content -->
    <main>
      <!-- Page Navbar -->
      @include('layouts.dashboard.navigation')

      @yield('content')
    </main>
  </div>

</body>

</html>
