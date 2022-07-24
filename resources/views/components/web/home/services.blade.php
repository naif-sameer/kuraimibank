<section class="services">
  <div class="services-wrapper">
    <h2 class="section-title text-center">
      @lang('heading.services-that-take-care-of-you')
    </h2>

    <!------ services slider ------>
    <section class="services-slider">
      <div class="services-slider-pagination">
        @foreach ($mainServices as $service)
          <div class="services-slider-pagination-item">{{ $service->title }}</div>
        @endforeach
      </div>

      <div class="services-slider-body">
        <div class="slider-wrapper">
          <div class="slider">
            @foreach ($mainServices as $service)
              <x-web.home.service-item :id="$service->id" :title="$service->title" :description="$service->description" :image="$service->image" />
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="services-slider-action">
    {{-- slider controller --}}
    <button id="services-slider-back-btn" aria-label="slider back btn">
      <x-icon icon="angle-right" />
    </button>

    <button id="services-slider-forward-btn" aria-label="slider forward btn">
      <x-icon icon="angle-left" />
    </button>
  </div>

</section>

@push('script')
  <script>
    superSlide({
      slider: ".services-slider .slider",
      backBtn: '#services-slider-back-btn',
      forwardBtn: '#services-slider-forward-btn',
      paginationItems: '.services-slider-pagination-item', // pagination items
    })
  </script>
@endpush
