<section class="bank-app">
  <div class="wrapper container">
    <img class="bank-app-phone-bg" src="{{ asset('images/bank-app-image.png') }}" alt="bank app">

    <div class="content">
      <h2 class="section-title">@lang('navbar.bank-apps')</h2>

      @isset($homeInfo->appDescription)
        <p class="description">{{ $homeInfo->appDescription }}</p>
      @endisset


      <div class="bank-app-slider-wrapper">
        <div class="slider bank-app-slider">
          <div class="slide">
            <h3 class="slide-title">الكريمي جوال</h3>
            <ul class="slide-list">
              <li>الكريمي جوال</li>
              <li>الكريمي جوال</li>
              <li>الكريمي جوال</li>
              <li>الكريمي جوال</li>
            </ul>

            <div class="slide-links">
              <a href="#" class="slide-links-item">
                <img src="{{ asset('images/app-store.png') }}" alt="app store icon">
              </a>

              <a href="#" class="slide-links-item">
                <img src="{{ asset('images/play-store.png') }}" alt="play store icon">
              </a>
            </div>
          </div>
          <div class="slide">
            <h4 class="slide-title">الكريمي جوال</h4>
            <ul class="slide-list">
              <li>الكريمي جوال</li>
              <li>الكريمي جوال</li>
              <li>الكريمي جوال</li>
              <li>الكريمي جوال</li>
            </ul>

            <div class="slide-links">
              <a href="#" class="slide-links-item">
                <img src="{{ asset('images/app-store.png') }}" alt="app store icon">
              </a>

              <a href="#" class="slide-links-item">
                <img src="{{ asset('images/play-store.png') }}" alt="play store icon">
              </a>
            </div>
          </div>
        </div>

        <div class="slider-pagination">
          <div class="item bank-app-slider-pagination-item is-active"></div>
          <div class="item bank-app-slider-pagination-item"></div>
        </div>
      </div>
    </div>
  </div>
</section>


@push('script')
  <script>
    superSlide({
      slider: ".bank-app-slider",
      paginationItems: '.bank-app-slider-pagination-item', // pagination items
    })
  </script>
@endpush
