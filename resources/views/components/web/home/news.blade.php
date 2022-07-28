<section class="news">
  <div class="container">
    <h2 class="section-title text-center">@lang('heading.bank-news')</h2>

    <div class="news-content">
      <div class="slider-wrapper">
        <div class="slider news-slider">
          @isset($news)
            @foreach ($news as $item)
              <x-web.news-item :id="$item->id" :title="$item->title" :description="$item->description" :image="$item->image" />
            @endforeach
          @endisset
        </div>
      </div>

      <div class="news-slider-actions">
        <button id="news-slider-back-btn" class="back-btn" aria-label="slider back btn">
          <x-icon icon="angle-right" />
        </button>

        <button id="news-slider-forward-btn" class="forward-btn" aria-label="slider forward btn">
          <x-icon icon="angle-left" />
        </button>
      </div>
    </div>

    <button class="see-more-link btn">@lang('heading.more')</button>
  </div>
</section>

@push('script')
  <script>
    superSlide({
      slider: ".news-slider",
      backBtn: '#news-slider-back-btn',
      forwardBtn: '#news-slider-forward-btn',
      availableMoveMode: true
    })
  </script>
@endpush
