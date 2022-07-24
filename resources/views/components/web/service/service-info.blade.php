@if ($service->other_advantage)
  <section class="super-section-wrapper service-info container">
    <div class="service-info-bg">
      <img src="{{ asset('uploads/images/' . $service->image) }}" alt="hero image">
    </div>


    <div class="super-section">

      <!------ service advantages ------>
      <section class="service-advantages">
        <div class="list">
          @foreach ($service->serviceAdvantages as $key => $advantage)
            <div class="item">
              <div class="item-number">{{ $key + 1 }}</div>
              <h2 class="item-title">{{ $advantage->title }}</h2>
              <p class="slider-item-description">{{ $advantage->description }}</p>
            </div>
          @endforeach
        </div>
      </section>

      <!------ service body ------>
      <section class="service-body">
        <!------ navigation ------>
        <div class="service-body-navigation">
          @if ($service->other_advantage)
            <div class="service-body-navigation-item">
              @lang('heading.advantages')
            </div>
          @endif

          @if ($service->service_conditions)
            <div class="service-body-navigation-item">
              @lang('heading.the-conditions')
            </div>
          @endif

          @if ($service->subscription_in_service)
            <div class="service-body-navigation-item">
              @lang('heading.subscription')
            </div>
          @endif

          @if ($service->questions)
            <div class="service-body-navigation-item">
              @lang('heading.frequently-asked-questions')
            </div>
          @endif
        </div>

        <!------ slider ------>
        <div class="service-body-slider">

          <div class="service-body-image">
            <img id="js-service-body-image" src="{{ asset('images/service-body-image.png') }}" alt="service image">
          </div>

          <div class="slider-wrapper">
            <div class="slider">
              <!------ advantages ------>
              @isset($service->other_advantage)
                <div class="slider-item" data-image='{{ asset('images/service-body-image.png') }}'>
                  <h3 class="slider-item-title">
                    @lang('heading.service-advantages') {{ $service->title }}
                  </h3>

                  <p class="slider-item-description">
                    {!! $service->other_advantage !!}
                  </p>

                  <button class="slider-item-btn btn-outline">@lang('heading.the-conditions')</button>
                </div>
              @endisset

              <!------ conditions ------>
              @isset($service->service_conditions)
                <div class="slider-item"
                  data-image='{{ asset('uploads/images/165598426955181548162917388368489.png') }}'>
                  <h3 class="slider-item-title">
                    @lang('heading.service-terms') {{ $service->title }}
                  </h3>

                  <p class="slider-item-description">
                    {!! $service->service_conditions !!}
                  </p>
                </div>
              @endisset

              <!------ subscribe ------>
              @isset($service->subscription_in_service)
                <div class="slider-item"
                  data-image='{{ asset('uploads/images/16565890256275811127252546050275.jpg') }}'>
                  <h3 class="slider-item-title">
                    @lang('heading.service-subscribe') {{ $service->title }}
                  </h3>

                  <p class="slider-item-description">
                    {!! $service->subscription_in_service !!}
                  </p>
                </div>
              @endisset

              <!------ questions ------>
              @isset($service->questions)
                <div class="slider-item"
                  data-image='{{ asset('uploads/images/16559725422529600467461009415996.png') }}'>
                  <h3 class="slider-item-title">
                    @lang('heading.frequently-asked-questions')
                  </h3>

                  <p class="slider-item-description">
                    {!! $service->questions !!}
                  </p>
                </div>
              @endisset

            </div>
          </div>
        </div>
      </section>
    </div>
  </section>

  @push('script')
    <script>
      superSlide({
        slider: ".service-body-slider .slider",
        paginationItems: ".service-body-navigation-item",
        onSlideChange: (index, item) => {
          el('#js-service-body-image').src = item.getAttribute('data-image');
        },
      })

      // mover to second slider
      el('.service-body-slider .slider-item-btn').addEventListener('click', () => {
        els('.service-body-navigation-item')[1].click()
      })
    </script>
  @endpush
@endif
