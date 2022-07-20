<div class="slide">
  <div class="slide-effect">
    {{-- <div class="after"></div> --}}
    <div class="slide-effect-content">
      <h3 class="title"> {{ $title }} </h3>
      <p class="description">{{ $description }} </p>
      <a href="/news/{{ $id }}" class="link">@lang('heading.more')</a>
    </div>
  </div>

  <div class="slide-image">
    <img src="{{ asset('uploads/images/' . $image) }}" alt="news images" class="slide-img">
  </div>

  <div class="slide-content">
    <h3 class="slide-title">{{ $title }} </h3>
    <a href="/news/{{ $id }}" class="slide-link">@lang('heading.more')</a>
  </div>
</div>
