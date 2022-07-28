<section class="our-points" style="background-image: url({{ asset('images/home-our-points-map.png') }})">
  <div class="container">
    <div class="content">
      <div class="content-body">
        <h2 class="section-title">@lang('heading.our-presence-points')</h2>

        <div class="list">
          <div class="item">
            <h3 class="item-value">400</h3>
            <h4 class="item-title">@lang('heading.bank-branch')</h4>
          </div>

          <div class="item">
            <h3 class="item-value">200</h3>
            <h4 class="item-title">@lang('heading.atm')</h4>
          </div>

          <div class="item">
            <h3 class="item-value">500</h3>
            <h4 class="item-title">@lang('heading.service-point')</h4>
          </div>
        </div>

        <a href="#" class="content-link btn">@lang('heading.your-nearest-point')</a>
      </div>

      <div class="content-map">
        <img src="{{ asset('images/map.png') }}" alt="map">
      </div>
    </div>
  </div>
</section>
