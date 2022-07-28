@extends('layouts.web.app')

@section('content')
  <main class="home">
    <!------ hero ------>
    <x-web.home.hero :homeInfo="$homeInfo" />

    <!------ currencies ------>
    <x-web.home.currencies :currencies="$currencies" />


    <!------ services ------>
    <x-web.home.services :mainServices="$mainServices" />

    <!------ bank app ------>
    <x-web.home.bank-app :homeInfo="$homeInfo" />


    <!------ news ------>
    <x-web.home.news :news='$news' />


    <!------ successes  numbers ------>
    <x-web.home.successes-numbers />


    <!------ our points ------>
    <x-web.home.our-points />
  </main>
@endsection
