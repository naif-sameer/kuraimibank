<header class="header">

  <div class="header-list container">
    {{-- right side --}}
    <div class="header-item-wrapper">
      <div class="header-item spa">
        <x-icon icon='user' />

        <span class="item-label"> @lang('navbar.jobs') </span>
      </div>

      <div class="header-item">
        <x-icon icon='phone' />
        <span class="item-label"> @lang('navbar.connect-with-us') </span>
      </div>
    </div>

    <!------ logo ------>
    <div class="header-logo">
      <img src="{{ asset('images/logo.svg') }}" alt="logo">
    </div>

    {{-- left side --}}
    <div class="header-item-wrapper">
      <div class="header-item">
        <x-icon icon='location-dot' />
        <span class="item-label"> @lang('navbar.service-points') </span>
      </div>

      <div class="header-item">
        <x-icon icon='search' />

        <a class="item-label change-lang-link" href="{{ route('AboutUs') }}en">en</a>
      </div>
    </div>
  </div>

  <nav class="nav">
    <ul class="nav-list container">
      <li class="nav-item is-active">
        <a href="/"> @lang('navbar.home') </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('AboutUs') }}"> @lang('navbar.about-bank') </a>
      </li>

      @foreach ($navItems as $item)
        <li class="nav-item">
          <a href="{{ $item['link'] }}">{{ $item['name']['ar'] }} </a>
        </li>
      @endforeach
    </ul>
  </nav>
</header>
