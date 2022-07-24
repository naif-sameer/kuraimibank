<section class="currencies">
  <div class="container">
    <div class="currencies-content">
      <div class="list">
        @foreach ($currencies as $currency)
          <x-web.home.currency-item :title="$currency->title" :sale="$currency->sale" :buy="$currency->buy" />
        @endforeach
      </div>
      <a href="/currencies" class="btn currencies-title">@lang('heading.currency-exchange')</a>
    </div>
  </div>
</section>
