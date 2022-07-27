<section class="about-bank">
  <div class="about-bank-content container">

    <!------ slider pagination ------>
    <div class="about-bank-pagination">
      <h2 class="title">@lang('navbar.about-bank')</h2>

      <div class="list">
        <div class="about-bank-pagination-item">@lang('heading.who-are-we')</div>
        <div class="about-bank-pagination-item">@lang('heading.vision')</div>
        <div class="about-bank-pagination-item">@lang('heading.the-message')</div>
        <div class="about-bank-pagination-item">@lang('heading.clarity-and-transparency')</div>
        <div class="about-bank-pagination-item">@lang('heading.purpose')</div>
      </div>
    </div>

    <!------ slider ------>
    <div class="about-slider">
      <div class="slider-wrapper">
        <div class="slider">
          <div class="slider-item">
            <h3 class="slider-item-title">@lang('heading.who-are-we')</h3>
            <p class="slider-item-description"> {{ $aboutUs->who_are_we }}</p>
          </div>

          <div class="slider-item">
            <h3 class="slider-item-title">@lang('heading.vision')</h3>
            <p class="slider-item-description"> {{ $aboutUs->vision }}</p>
          </div>

          <div class="slider-item">
            <h3 class="slider-item-title">@lang('heading.the-message')</h3>
            <p class="slider-item-description"> {{ $aboutUs->message }}</p>
          </div>

          <div class="slider-item">
            <h3 class="slider-item-title">@lang('heading.clarity-and-transparency')</h3>
            <p class="slider-item-description"> {{ $aboutUs->clarity_transparency }}</p>
          </div>

          <div class="slider-item">
            <h3 class="slider-item-title">@lang('heading.purpose')</h3>
            <p class="slider-item-description"> {{ $aboutUs->purpose }}</p>
          </div>
        </div>
      </div>

      <div class="slider-action">
        <button class="back-slider-btn">@lang('pagination.previous')</button>
        <button class="forward-slider-btn">@lang('pagination.next')</button>
      </div>
    </div>
  </div>
</section>


@push('script')
  <script>
    superSlide({
      slider: ".about-slider .slider",
      forwardBtn: ".about-slider .forward-slider-btn",
      backBtn: ".about-slider .back-slider-btn",

      paginationItems: '.about-bank-pagination-item', // pagination items
    })
  </script>
@endpush
