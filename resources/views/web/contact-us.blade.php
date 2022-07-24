@extends('layouts.web.app')


@section('content')
  <main class="contact-us">
    <section class="hero">
    </section>

    <section class="contact-us-info super-section container">
      <h2 class="title">@lang('heading.connect-with-us')</h2>
      <p class="description">@lang('heading.contact-us-description') </p>


      <!------ list ------>
      <div class="list">
        <div class="item">
          <div class="item-icon-wrapper">
            <div class="item-icon">

              <x-icon icon='phone' />
            </div>
          </div>

          <div class="item-content">
            <div class="item-title">@lang('heading.connect-with-us')</div>
            <div class="item-info">
              <div class="item-info item">@lang('heading.telephone'):</div>
              <div class="item-info item">@lang('heading.fax'):</div>
              <div class="item-info item">@lang('heading.free-call'):</div>
              <div class="item-info item">@lang('heading.mail-box'):</div>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="item-icon-wrapper">
            <div class="item-icon">

              <x-icon icon='envelope' />
            </div>
          </div>
          <div class="item-title">@lang('heading.send-message-to-email')</div>
        </div>

        <div class="item">
          <div class="item-icon-wrapper">
            <div class="item-icon">
              <x-icon icon='location-dot' />
            </div>
          </div>
          <div class="item-title">@lang('heading.our-presence-points')</div>
        </div>
      </div>

      <!------ form ------>
      <form action="" class="form">
        <h3 class="form-title">@lang('heading.how-we-can-help-you')</h3>

        <div class="form-group">
          <input type="text" name="name">
          <label for="">@lang('heading.name')</label>
        </div>

        <div class="form-group">
          <input type="number" name="phone">
          <label for="">@lang('heading.telephone')</label>
        </div>

        <div class="form-group">
          <input type="email" name="email">
          <label for="">@lang('heading.email')</label>
        </div>

        <div class="form-group">
          <input type="text" name="message">
          <label for="">@lang('heading.the-message')</label>
        </div>

        <button class="form-btn btn">@lang('heading.send')</button>
      </form>
    </section>
  </main>
@endsection
