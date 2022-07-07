@extends('layouts.web.app')


@section('content')
  <main class="home">

    <!------ hero ------>
    <section class="hero">
      <div class="container">
        <div class="hero-content">
          <h1 class='hero-title'>حساب في كل بيت يمني </h1>
          <p class="hero-description">
            يسهم في التنمية الاقتصادية والاجتماعية
          </p>


          <div class="hero-navigation">
            <div class="hero-navigation-item is-active"></div>
            <div class="hero-navigation-item"></div>
            <div class="hero-navigation-item"></div>
          </div>


        </div>
      </div>
    </section>


    <!------ currencies ------>
    <section class="currencies">
      <div class="container">
        <div class="currencies-content">
          <div class="list">

            @foreach ($currencies as $currency)
              <div class="item">
                <div class="item-name">
                  <h3 class="item-title">{{ $currency->name['ar'] }}</h3>

                  <x-icon icon='arrow-trend-down' />
                </div>

                <div class="item-sale">
                  <h3 class="item-subtitle">Sale</h3>

                  <div class="item-value">{{ $currency->sale }}</div>
                </div>

                <div class="item-buy">
                  <h3 class="item-subtitle">buy</h3>

                  <div class="item-value">{{ $currency->buy }}</div>
                </div>
              </div>
            @endforeach
          </div>

          <h3 class="btn">@lang('heading.currency-exchange')</h3>
        </div>
      </div>
    </section>


    <!------ services ------>
    <section class="services">
      <div class="services-wrapper">
        <h2 class="section-title text-center">
          @lang('heading.services-that-take-care-of-you')
        </h2>


        <section class="services-slider">
          <div class="services-slider-pagination">
            @foreach ($mainServices as $service)
              <div class="services-slider-pagination-item">{{ $service['title']['ar'] }}</div>
            @endforeach
          </div>

          <div class="services-slider-body">
            <div class="slider-wrapper">
              <div class="slider">

                @foreach ($mainServices as $service)
                  <div class="slider-item">
                    <div class="slide-content">
                      <h3 class="slide-title">{{ $service['title']['ar'] }}</h3>

                      <p class="slide-description">{{ $service['description']['ar'] }}</p>

                      <a href="services/{{ $service['id'] }}" class="slide-btn btn">@lang('heading.more')</a>
                    </div>

                    <div class="slide-bg"> <img src="{{ $service['image'] }}" alt="slider images" /> </div>
                  </div>
                @endforeach
              </div>
            </div>

          </div>
        </section>
      </div>

      <div class="services-slider-action">
        {{-- slider controller --}}
        <button id="services-slider-back-btn">
          <x-icon icon="angle-right" />
        </button>

        <button id="services-slider-forward-btn">
          <x-icon icon="angle-left" />
        </button>
      </div>

    </section>

    <!------ bank app ------>
    <section class="bank-app">
      <div class="wrapper container">
        <img class="bank-app-phone-bg" src="{{ asset('images/bank-app-image.png') }}" alt="bank app">

        <div class="content">
          <h2 class="section-title">@lang('navbar.bank-apps')</h2>

          <p class="description">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
            العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
            النص
            هو
            مثال لنص يمكن أن يستبدل
          </p>


          <div class="bank-app-slider-wrapper">
            <div class="slider bank-app-slider">
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

    <!------ news ------>
    <section class="news">
      <div class="container">
        <h2 class="section-title text-center">@lang('heading.bank-news')</h2>


        <div class="news-content">
          <div class="slider-wrapper">
            <div class="slider news-slider">
              <div class="slide">
                <img src="{{ asset('images/home-hero-bg.jpg') }}" alt="news images" class="slide-img">

                <div class="slide-content">

                  <h3 class="slide-title">مشروع تحديث أنظمة البنك</h3>

                  <p class="slide-description">
                    هذا النص هو مثال لنص يمكن أن يستبدل في
                    نفس المساحة، لقد تم توليد هذا النص من مولد
                    النص العربى هذا النص هو مثال لنص يمكن أن
                    يستبدل في نفس المساحة، لقد تم توليد هذا
                    النص من مولد النص العربى هذا النص هو مثال
                    لنص يمكن أن يستبدل
                  </p>

                  <a href="#" class="slide-link">@lang('heading.more')</a>
                </div>

              </div>
              <div class="slide">
                <img src="{{ asset('images/home-hero-bg.jpg') }}" alt="news images" class="slide-img">
                <div class="slide-content">

                  <h3 class="slide-title">مشروع تحديث أنظمة البنك</h3>

                  <p class="slide-description">
                    هذا النص هو مثال لنص يمكن أن يستبدل في
                    نفس المساحة، لقد تم توليد هذا النص من مولد
                    النص العربى هذا النص هو مثال لنص يمكن أن
                    يستبدل في نفس المساحة، لقد تم توليد هذا
                    النص من مولد النص العربى هذا النص هو مثال
                    لنص يمكن أن يستبدل
                  </p>

                  <a href="#" class="slide-link">@lang('heading.more')</a>
                </div>
              </div>
              <div class="slide">
                <img src="{{ asset('images/home-hero-bg.jpg') }}" alt="news images" class="slide-img">

                <div class="slide-content">

                  <h3 class="slide-title">مشروع تحديث أنظمة البنك</h3>

                  <p class="slide-description">
                    هذا النص هو مثال لنص يمكن أن يستبدل في
                    نفس المساحة، لقد تم توليد هذا النص من مولد
                    النص العربى هذا النص هو مثال لنص يمكن أن
                    يستبدل في نفس المساحة، لقد تم توليد هذا
                    النص من مولد النص العربى هذا النص هو مثال
                    لنص يمكن أن يستبدل
                  </p>

                  <a href="#" class="slide-link">@lang('heading.more')</a>
                </div>
              </div>
            </div>
          </div>

          <div class="news-slider-actions">
            <button id="news-slider-back-btn" class="back-btn">
              <x-icon icon="angle-right" />
            </button>

            <button id="news-slider-forward-btn" class="forward-btn">
              <x-icon icon="angle-left" />
            </button>
          </div>
        </div>

        <button class="see-more-link btn">@lang('heading.more')</button>
      </div>
    </section>

    <!------ successes  numbers ------>
    <section class="successes-number">
      <div class="container">
        <h2 class="section-title"> @lang('heading.our-successes-in-numbers')</h2>

        <div class="list">
          @for ($i = 1; $i <= 8; $i++)
            <div class="item" data-number="{{ 100 * $i }}">
              <h4 class="item-title">+{{ 100 * $i }}</h4>
              <p class="item-description">تمويل عقاري تم تمويله
                تمويلا شامل</p>
            </div>
          @endfor
        </div>
      </div>
    </section>


    <!------ our points ------>
    <section class="our-points">
      <div class="container">
        <div class="content">
          <div class="content-body">
            <h2 class="section-title">@lang('heading.our-presence-points')</h2>

            <div class="list">
              <div class="item">
                <h4 class="item-value">400</h4>
                <h5 class="item-title">@lang('heading.bank-branch')</h5>
              </div>

              <div class="item">
                <h4 class="item-value">200</h4>
                <h5 class="item-title">@lang('heading.atm')</h5>
              </div>

              <div class="item">
                <h4 class="item-value">500</h4>
                <h5 class="item-title">@lang('heading.service-point')</h5>
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

  </main>
@endsection

@section('script')
  <script>
    superSlide({
      slide: ".services-slider .slider",
      backBtn: '#services-slider-back-btn',
      forwardBtn: '#services-slider-forward-btn',
      paginationItems: '.services-slider-pagination-item', // pagination items
    })

    superSlide({
      slide: ".bank-app-slider",
      paginationItems: '.bank-app-slider-pagination-item', // pagination items
    })

    superSlide({
      slide: ".news-slider",
      backBtn: '#news-slider-back-btn',
      forwardBtn: '#news-slider-forward-btn',
    })
  </script>
@endsection
