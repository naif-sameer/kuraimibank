<section class="info">
  <div class="super-section container">
    <h1 class="super-section-title">{{ $story->title }}</h1>

    <div class="story-description">

      <div class="slider-wrapper">
        @foreach ($story->images as $image)
          <div class="story-image">
            <img src="{{ asset('uploads/images/' . $image->link) }}" alt="story image">
          </div>
        @endforeach
      </div>

      <div>
        <p>
          {{ $story->description }}
          {{ $story->description }}
          {{ $story->description }}
        </p>

        <p>
          {{ $story->description }}
          {{ $story->description }}
        </p>

        <p>
          {{ $story->description }}
          {{ $story->description }}
          {{ $story->description }}
        </p>

        <p>
          {{ $story->description }}
          {{ $story->description }}
        </p>

        <p>
          {{ $story->description }}
          {{ $story->description }}
          {{ $story->description }}
        </p>

        <p>
          {{ $story->description }}
          {{ $story->description }}
          {{ $story->description }}
          {{ $story->description }}
        </p>


      </div>



    </div>
  </div>
</section>
