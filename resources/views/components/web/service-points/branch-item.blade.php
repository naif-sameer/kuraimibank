<section class="item">
  <div class="item-header">
    <h3 class="item-title">{{ $title }}</h3>

    <div class="item-header-info">
      <div class="icon-bank-branch">
        {{-- <img src="{{ asset('images/atm-icon.png') }}" alt="atm icon"> --}}
        <x-icon icon='money-simple-from-bracket' />
        <span>@lang('heading.atm')</span>

      </div>

      <div>
        <x-icon icon='building' />
        <span>@lang('heading.bank-branch')</span>

      </div>
    </div>
  </div>

  <p class="item-description">{{ $address }}</p>
  <p class="item-description">{{ $country }}</p>
  <p class="item-description">{{ $phone }}</p>
</section>
