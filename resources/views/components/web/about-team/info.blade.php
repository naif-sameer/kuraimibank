<section class="super-section info container">
  <div class="list">
    @foreach ($teamRoles as $team)
      <div class="item">
        <h2 class="super-section-title item-title"> {{ $team->title }} </h2>

        @if ($team->description)
          <p class="item-description">{{ $team->description }}</p>
        @endif


        <section class="members-list">
          @foreach ($team->members as $member)
            <div class="member">
              <div class="member-image">
                <img src="{{ asset('uploads/images/' . $member->image) }}" alt="">
              </div>

              <h3 class="member-title">{{ $member->name }}</h3>
              <p class="member-subtitle">{{ $member->role }}</p>
            </div>
          @endforeach
        </section>
      </div>
    @endforeach
  </div>
</section>
