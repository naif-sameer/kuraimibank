@extends('layouts.web.app')

@section('content')
  <main class="about-team">
    <x-web.about-team.hero :teamRoles="$teamRoles" />

    <x-web.about-team.info :teamRoles="$teamRoles" />

    <x-web.shared.share-to-social-media :link="route('AboutTeam')" />
  </main>
@endsection
