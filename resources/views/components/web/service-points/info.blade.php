<section class="info" style="background-image: url({{ asset('images/google-map.png') }})">
  <div class="super-section container">

    <form class="info-form">
      <!------ select country  ------>
      <div class="form-group">
        <label for="">الدولة</label>
        <select>
          <option>Yemen</option>
          <option>America</option>
        </select>
      </div>

      <!------ select city  ------>
      <div class="form-group">
        <label for="">المدينة</label>
        <select>
          <option>صنعاء</option>
          <option>Taiz</option>
        </select>
      </div>

      <!------ select type of location  ------>
      <div class="form-group">
        <label for="">نوع الموقع</label>
        <select>
          <option>فرع</option>
          <option>ماكينات الصرافة</option>
        </select>
      </div>

      <!------ btn ------>
      <button type="button" class="btn-primary form-btn">@lang('heading.execution-of-the-request')</button>
    </form>

    <h2 class="info-title section-title">
      @lang('heading.branches-and-atms')
    </h2>

    <p class="info-description">عرض 45 موقع</p>
  </div>

  <div class="list-wrapper container">
    <div class="list">
      <x-web.service-points.branch-item title="شارع الاصبحي" address="شارع الاصبحي _ جوار معهد البريطاني"
        country="اليمن صنعاء" phone="777 999 000" />

      <x-web.service-points.branch-item title="شارع الاصبحي" address="شارع الاصبحي _ جوار معهد البريطاني"
        country="اليمن صنعاء" phone="777 999 000" />

      <x-web.service-points.branch-item title="شارع الاصبحي" address="شارع الاصبحي _ جوار معهد البريطاني"
        country="اليمن صنعاء" phone="777 999 000" />

      <x-web.service-points.branch-item title="شارع الاصبحي" address="شارع الاصبحي _ جوار معهد البريطاني"
        country="اليمن صنعاء" phone="777 999 000" />

      <div class="list-pagination">
        <button class="list-pagination-item is-active">1</button>
        <button class="list-pagination-item">2</button>
        <button class="list-pagination-item">3</button>
      </div>
    </div>
  </div>
</section>
