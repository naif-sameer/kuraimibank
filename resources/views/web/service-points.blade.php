@extends('layouts.web.app')


@section('content')
  <main class="service-points">
    <x-web.service-points.hero :title="$servicePointInfo->title" :description="$servicePointInfo->description" />

    <x-web.service-points.info />
  </main>
@endsection
