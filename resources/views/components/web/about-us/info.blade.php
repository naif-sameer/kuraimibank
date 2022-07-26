<section class="info">
  <div class="container">
    <h2 class="info-title">@lang('heading.values-and-principles')</h2>
  </div>

  <div class="list">

    <!------ commitment item ------>
    <div class="item">
      <div class="container">
        <h3 class="item-title">@lang('heading.commitment')</h3>
      </div>

      <div class="item-description">
        <div class="container">
          <p class="item-description-content">
            {{ $aboutUs->commitment }}
          </p>
        </div>

        <div class="item-image">
          <img src="{{ asset('images/home-hero-bg.jpg') }}" alt="about us image">
        </div>
      </div>
    </div>

    <!------ respect item ------>
    <div class="item item-end">
      <div class="container">
        <h3 class="item-title">@lang('heading.respect')</h3>
      </div>

      <div class="item-description">
        <div class="container">
          <p class="item-description-content">
            {{ $aboutUs->respect }}
          </p>
        </div>

        <div class="item-image">
          <img src="{{ asset('images/home-hero-bg.jpg') }}" alt="about us image">
        </div>
      </div>
    </div>

    <!------ clarity-and-transparency item ------>
    <div class="item">
      <div class="item-content">
        <div class="container">
          <h3 class="item-title">@lang('heading.clarity-and-transparency')</h3>
        </div>

        <div class="item-description">
          <div class="container">
            <p class="item-description-content">
              {{ $aboutUs->clarity_transparency }}
            </p>
          </div>

          <div class="item-image">
            <img src="{{ asset('images/home-hero-bg.jpg') }}" alt="about us image">
          </div>
        </div>
      </div>
    </div>

    <!------ Philanthropy item ------>
    <div class="item item-end">
      <div class="container">
        <h3 class="item-title">@lang('heading.philanthropy')</h3>
      </div>

      <div class="item-description">
        <div class="container">
          <p class="item-description-content">
            {{ $aboutUs->philanthropy }}
          </p>
        </div>

        <div class="item-image">
          <img src="{{ asset('images/home-hero-bg.jpg') }}" alt="about us image">
        </div>
      </div>
    </div>
  </div>
</section>
