<?php

namespace Database\Seeders;

use App\Models\OurPartner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurPartnerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $loremText = 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
    .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء
    لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة';

    OurPartner::create([
      'title'                         => ['ar' => 'هذا النص هو مثال', 'en' => 'هذا النص هو مثال'],
      'description'                   => ['ar' => $loremText, 'en' => $loremText],
      'image'                         => 'our-partner-1.png',
    ]);

    OurPartner::create([
      'title'                         => ['ar' => 'هذا النص هو مثال', 'en' => 'هذا النص هو مثال'],
      'description'                   => ['ar' => $loremText, 'en' => $loremText],
      'image'                         => 'our-partner-1.png',
    ]);

    OurPartner::create([
      'title'                         => ['ar' => 'هذا النص هو مثال', 'en' => 'هذا النص هو مثال'],
      'bank_messaging_country'        => ['ar' => 'yemen', 'en' => 'yemen'],
      'image'                         => 'our-partner-1.png',
    ]);

    OurPartner::create([
      'title'                         => ['ar' => 'هذا النص هو مثال', 'en' => 'هذا النص هو مثال'],
      'bank_messaging_country'        => ['ar' => 'yemen', 'en' => 'yemen'],
      'image'                         => 'our-partner-1.png',
    ]);

    OurPartner::create([
      'title'                         => ['ar' => 'هذا النص هو مثال', 'en' => 'هذا النص هو مثال'],
      'bank_messaging_country'        => ['ar' => 'المملكة العربية السعودية', 'en' => 'المملكة العربية السعودية'],
      'image'                         => 'our-partner-1.png',
    ]);

    OurPartner::create([
      'title'                         => ['ar' => 'هذا النص هو مثال', 'en' => 'هذا النص هو مثال'],
      'bank_messaging_country'        => ['ar' => 'المملكة العربية السعودية', 'en' => 'المملكة العربية السعودية'],
      'image'                         => 'our-partner-1.png',
    ]);
  }
}
