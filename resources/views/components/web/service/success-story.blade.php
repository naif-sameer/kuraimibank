<section class="success-story">
  <div class="container">
    <h2 class="section-title">@lang('heading.success-stories')</h2>

    <!------ slider ------>
    <div class="success-story-slider">
      <div class="slider-wrapper">
        <div class="slider">
          @isset($service->successStories)
            @foreach ($service->successStories as $story)
              <div class="slider-item"
                style="background-image: url({{ asset('uploads/images/' . $story->image->link) }});">
                <h3 class="slider-item-title">
                  {{ $story->title }}
                </h3>
                <p class="slider-item-description">
                  {{ $story->description }}
                </p>

                <a href="/services/{{ $service->id }}/{{ $story->id }}">
                  @lang('heading.read-more')
                </a>
              </div>
            @endforeach
          @endisset
        </div>
      </div>

      <div class="slider-action">
        <button class="back-slider-btn slider-btn">
          <x-icon icon='angle-right' />
        </button>

        <button class="forward-slider-btn slider-btn">
          <x-icon icon='angle-left' />
        </button>
      </div>
    </div>
  </div>
</section>

@push('script')
  <script>
    superSlide({
      slider: ".success-story-slider .slider",
      forwardBtn: ".success-story-slider .forward-slider-btn",
      backBtn: ".success-story-slider .back-slider-btn",
    })
  </script>
@endpush
