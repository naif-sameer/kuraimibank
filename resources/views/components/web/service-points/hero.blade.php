<section class="hero hero-overlay" style="background-image: url({{ asset('uploads/images/story-bg.png') }})">
  <div class="hero-content container">
    <div class="breadcrumb"> @lang('navbar.home') / @lang('heading.service-points')</div>

    @isset($title)
      <h1 class="hero-title"> {{ $title }} </h1>
    @endisset

    @isset($description)
      <p class="hero-description"> {{ $description }} </p>
    @endisset
  </div>
</section>
