<section class="partners">
  <div class="super-section container">
    <h1 class="super-section-title">@lang('heading.our-partners')</h1>
    {{-- main partner --}}
    <div class="main-partners-list">
      @foreach ($partners as $partner)
        <div class="item" id="our-partners-id-{{ $partner->id }}">
          <div class="item-image">
            <img src="{{ asset('uploads/images/' . $partner->image) }}" alt="partner image">
          </div>
          <div class="item-content">
            <h2 class="item-title">{{ $partner->title }}</h2>

            <p class="item-description">{{ $partner->description }}</p>
          </div>
        </div>
      @endforeach
    </div>



    <!------ messaging partners ------>
    <div class="messaging-banks">
      <h2 class="title super-section-title"> @lang('heading.banks-messaging') </h2>

      <div class="item-label">
        المملكة العربية السعودية
      </div>
      <div class="list">
        @foreach ($bankMessagingPartners as $partner)
          <div class="item">
            <div class="item-image">
              <img src="{{ asset('uploads/images/' . $partner->image) }}" alt="partner image">
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
