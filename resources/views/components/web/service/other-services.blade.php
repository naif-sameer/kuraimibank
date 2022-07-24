<section class="other-services container">
  <h2 class="section-title">@lang('heading.other-services-may-be-interested-in')</h2>

  <div class="slider-wrapper">
    <div class="slider">

      @isset($services)
        @foreach ($services as $service)
          <a href="{{ route('Service', [$service]) }}" class="slider-item">
            <div class="slider-item-image">
              <img src="{{ asset('uploads/images/' . $service->image) }}" alt="service image" class="slider-item-image">
            </div>

            <h3 class="slider-item-title"> {{ $service->title }} </h3>
          </a>
        @endforeach
      @endisset
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
</section>

@push('script')
  <script>
    superSlide({
      slider: ".other-services .slider",
      forwardBtn: ".other-services .forward-slider-btn",
      backBtn: ".other-services .back-slider-btn",

      availableMoveMode: true
    })
  </script>
@endpush
