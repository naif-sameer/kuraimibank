<section class="hero hero-overlay" style="background-image: url({{ asset('uploads/images/' . $aboutUs->image) }})">

  <div class="container">

    <div class="breadcrumb"> @lang('navbar.home') / @lang('navbar.about-bank')</div>

    <h1 class="hero-title">
      {{ $aboutUs->title }}
    </h1>

    <p class="hero-description">{{ $aboutUs->description }}</p>
  </div>

</section>
