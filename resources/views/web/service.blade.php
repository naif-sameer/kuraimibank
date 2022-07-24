@extends('layouts.web.app')

@section('content')
  <main class="service">
    <!------ hero ------>
    <x-web.service.hero :service='$service' />

    <!------ service info ------>
    <x-web.service.service-info :service='$service' />

    <!------ service quote ------>
    <x-web.service.service-quote :service='$service' />

    <!------ success story ------>
    <x-web.service.success-story :service='$service' />

    <!------ other services ------>
    <x-web.service.other-services :services="$otherServices" />
  </main>
@endsection
