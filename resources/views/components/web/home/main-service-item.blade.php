<div class="slider-item">
  <div class="slide-content">
    <h3 class="slide-title">{{ $title }}</h3>

    <p class="slide-description">{{ $description }}</p>

    <a href="services/{{ $id }}" class="slide-link btn">@lang('heading.more')</a>
  </div>

  <div class="slide-bg">
    <img src="{{ asset('uploads/images/' . $image) }}" alt="slider images" />
  </div>
</div>
