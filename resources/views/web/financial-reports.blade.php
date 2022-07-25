@extends('layouts.web.app')


@section('content')
  <main class="reports">
    <!------ hero section ------>
    <section class="hero">
      <div class="hero-content container">
        <div class="breadcrumb"> @lang('navbar.home') / @lang('heading.our-partners')</div>
      </div>
    </section>

    <!------ reports list ------>
    <section class="super-section container">
      <h1 class="super-section-title">@lang('heading.reports')</h1>

      <div class="list">
        @foreach ($reports as $report)
          <a href="{{ asset('uploads/pdf/' . $report->pdf) }}" download target="_blank" class="item">
            <div class="item-title">
              {{ $report->year }}
            </div>

            <div class="item-label">
              @lang('heading.financial-report')
              {{ $report->year }}
            </div>
          </a>
        @endforeach
      </div>
    </section>

    <!------ share to social media ------>
    <x-web.shared.share-to-social-media link='' />
  </main>
@endsection
