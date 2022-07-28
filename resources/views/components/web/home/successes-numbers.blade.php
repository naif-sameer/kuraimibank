<section class="successes-number">
  <div class="container">
    <h2 class="section-title"> @lang('heading.our-successes-in-numbers')</h2>

    <div class="list">
      @foreach ($successNumbers as $successNumber)
        <div class="item" data-number="{{ $successNumber->title }}">
          <h3 class="item-title">+{{ $successNumber->title }}</h3>
          <p class="item-description">{{ $successNumber->description }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
