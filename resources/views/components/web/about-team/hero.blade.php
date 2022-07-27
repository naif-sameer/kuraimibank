<section class="hero hero-overlay">


  <div class="hero-ticker-images">
    @foreach ($teamRoles as $team)
      <div class="list-ticker-content">
        <div class="list">
          @foreach ($team->members as $member)
            <section class="item-image">
              <img loading="lazy" src="{{ asset('uploads/images/' . $member->image) }}" alt="">
            </section>
          @endforeach
        </div>
      </div>
    @endforeach

    @for ($index = 0; $index < 2; $index++)
      {{-- {{ $teamRoles }} --}}
      <div class="list-ticker-content">

        <div class="list">
          @foreach ($teamRoles[$index]->members as $member)
            <section class="item-image">
              <img loading="lazy" src="{{ asset('uploads/images/' . $member->image) }}" alt="">
            </section>
          @endforeach
        </div>
      </div>
    @endfor
  </div>

  <div class="container">
    <div class="breadcrumb"> @lang('navbar.home') / @lang('navbar.about-bank')</div>
  </div>
</section>


@push('script')
  <script>
    superTicker({
      item: '.list-ticker-content'
    })
  </script>
@endpush
