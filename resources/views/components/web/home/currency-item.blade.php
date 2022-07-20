<div class="item">
  <div class="item-name">
    <h2 class="item-title">{{ $title }}</h2>

    <x-icon icon='arrow-trend-down' />
  </div>

  <div class="item-sale">
    <h3 class="item-subtitle">@lang('heading.sale')</h3>

    <div class="item-value">{{ $sale }}</div>
  </div>

  <div class="item-buy">
    <h3 class="item-subtitle">@lang('heading.buy')</h3>

    <div class="item-value">{{ $buy }}</div>
  </div>
</div>
