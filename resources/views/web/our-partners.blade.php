@extends('layouts.web.app')


@section('content')
  <main class="our-partners">

    <x-web.our-partners.hero />

    <x-web.our-partners.partners :partners='$partners' :bankMessagingPartners='$bankMessagingPartners' />
  </main>
@endsection
