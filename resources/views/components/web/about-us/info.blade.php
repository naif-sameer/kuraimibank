<section class="info">
  <div class="container">
    <h2 class="info-title">@lang('heading.values-and-principles')</h2>
  </div>

  <div class="list">
    <div class="item">
      <div class="item-image">
        <img src="{{ asset('images/home-hero-bg.jpg') }}" alt="about us image">
      </div>

      <h3 class="item-title container">@lang('heading.commitment')</h3>

      <div class="item-description">
        <div class="container">
          <p class="item-description-content">
            {{ $aboutUs->commitment }}
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
