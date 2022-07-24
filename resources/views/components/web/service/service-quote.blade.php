@isset($service->service_slogan)
  @if ($service->service_slogan)
    <section class="service-quote">
      <div class="container">
        <p class="description">
          {!! $service->service_slogan !!}
        </p>
      </div>
    </section>
  @endif
@endisset
