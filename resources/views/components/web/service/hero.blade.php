<section class="hero">
  <div class="container">
    <div class="hero-wrapper">

      <div class="hero-content">
        @isset($service->mainService)
          <div class="breadcrumb"> {{ $service->mainService->title }} / {{ $service->title }}</div>
        @endisset

        <h1 class="hero-title">{{ $service->title }}</h1>

        <p class="hero-description">{{ $service->description }}</p>

        <a href="#" class="hero-action-btn btn">@lang('heading.service-request')</a>
      </div>

      {{-- <div class="hero-image-wrapper">
        <div class="hero-image">
          <img src="{{ asset('uploads/images/' . $service->image) }}" alt="hero image">
        </div>
      </div> --}}
    </div>
  </div>
</section>
