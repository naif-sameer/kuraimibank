<section class="news container">

  <h2 class="section-title"> @lang('heading.other-news') </h2>

  <div class="list">
    @isset($news)
      @foreach ($news as $item)
        <div class="slide">
          <div class="slide-effect">
            <div class="slide-effect-content">
              <h3 class="title"> {{ $item->title }} </h3>
              <p class="description">{{ $item->description }} </p>
              <a href="/news/{{ $item->id }}" class="link">@lang('heading.more')</a>
            </div>
          </div>

          <div class="slide-image">
            <img src="{{ asset('uploads/images/' . $item->image) }}" alt="news images" class="slide-img">
          </div>

          <div class="slide-content">
            <h3 class="slide-title">{{ $item->title }} </h3>
            <a href="/news/{{ $item->id }}" class="slide-link">@lang('heading.more')</a>
          </div>
        </div>
      @endforeach
    @endisset
  </div>

</section>
