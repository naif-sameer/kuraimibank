@extends('layouts.web.app')


@section('content')
  <main class="service-story">

    <x-web.service-story.hero :story="$story" />

    <x-web.service-story.info :story="$story" />

    <x-web.service-story.news :news='$news' />

    <!------ share to social media ------>
    <x-web.shared.share-to-social-media link='{{ Request::fullUrl() }}' />

  </main>
@endsection
