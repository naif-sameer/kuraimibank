@extends('layouts.web.app')


@section('content')
  <main class="service">
    <section class="hero">
      <div class="container">
        <div class="hero-wrapper">

          <div class="hero-content">
            <div class="breadcrumb">التمويل/مشروعي</div>

            <h1 class="hero-title">{{ $service->title[$locale] }}</h1>

            <p class="hero-description">{{ $service->description[$locale] }}</p>
          </div>

          <div class="hero-image-wrapper">
            <div class="hero-image">
              <img src="{{ asset('uploads/images/' . $service->image) }}" alt="hero image">
            </div>
          </div>
        </div>

      </div>
    </section>
  </main>
@endsection
