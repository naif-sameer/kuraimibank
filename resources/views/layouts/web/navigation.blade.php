<header class="header">

  <div class="header-list container">
    <div class="mobile-open-menu">
      <x-icon icon='bars' />
    </div>

    {{-- right side --}}
    <div class="header-item-wrapper">
      <div class="header-item spa">
        <x-icon icon='user' />

        <span class="item-label"> @lang('navbar.jobs') </span>
      </div>

      <a href="{{ route('ContactUs') }}" class="header-item">
        <x-icon icon='phone' />
        <span class="item-label"> @lang('navbar.connect-with-us') </span>
      </a>
    </div>

    <!------ logo ------>
    <div class="header-logo">
      <img src="{{ asset('images/logo.svg') }}" alt="logo">
    </div>

    {{-- left side --}}
    <div class="header-item-wrapper only-mobile">
      <div class="header-item">
        <x-icon icon='location-dot' />
        <span class="item-label"> @lang('navbar.service-points') </span>
      </div>

      <div class="header-item change-lang">
        <x-icon icon='search' />

        <a class="item-label change-lang-link" href="/en">en</a>
      </div>
    </div>
  </div>

  <nav class="nav">
    <ul class="nav-list container">
      <li @class(['nav-item', 'is-active' => Request::is('/')])>
        <a href="/"> @lang('navbar.home') </a>
      </li>


      <li @class(['nav-item', 'is-active' => Request::is('about-us')])>
        <a href="{{ route('AboutUs') }}"> @lang('navbar.about-bank') </a>
      </li>


      @foreach ($navItems as $item)
        <li @class([
            'nav-item',
            'is-active' => Request::is('services/' . $item['id']),
        ])>
          <a href="/services/{{ $item['id'] }}">{{ $item['name']['ar'] }} </a>
        </li>
      @endforeach
    </ul>

    <div class="mobile-close-menu">
      <x-icon icon='close' />
    </div>
  </nav>
</header>


@push('script')
  <script>
    el('.mobile-close-menu').addEventListener('click', () => {
      el('.nav').classList.remove('is-active')
    })

    el('.mobile-open-menu').addEventListener('click', () => {
      el('.nav').classList.add('is-active')
    })

    console.log('test')
  </script>
@endpush
