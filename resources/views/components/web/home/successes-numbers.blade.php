<section class="successes-number">
  <div class="container">
    <h2 class="section-title"> @lang('heading.our-successes-in-numbers')</h2>

    <div class="list">
      @for ($i = 1; $i <= 8; $i++)
        <div class="item" data-number="{{ 100 * $i }}">
          <h3 class="item-title">+{{ 100 * $i }}</h3>
          <p class="item-description">@lang('heading.fully-financed-real-estate-financing')</p>
        </div>
      @endfor
    </div>
  </div>
</section>
