@extends('layouts.web.app')


@section('content')
  <main class="about-us">
    <x-web.about-us.hero :aboutUs="$aboutUs" />

    <x-web.about-us.about :aboutUs="$aboutUs" />

    <x-web.about-us.info :aboutUs="$aboutUs" />

    <x-web.shared.share-to-social-media :link="route('AboutUs')" />
  </main>
@endsection
