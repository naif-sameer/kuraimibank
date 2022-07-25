<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $lorem_text = 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
    النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
    هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
    النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم';

    AboutUs::create([
      'title' => [
        'ar' => 'حساب في كل بيت يمني',
        'en' => 'حساب في كل بيت يمني'
      ],
      'description' => [
        'ar' => 'يسهم في التنمية الاقتصادية والاجتماعية وفي تحسين معيشة الفرد والمجتمع عن طريق خدمات مالية متنوعة ،
          وبخبرات متراكمة تزيد عن أربعين عاما أسس هذا الصرح
          الاقتصادي ليقدم خدماته للمواطنين بجميع المحافظات',
        'en' => 'يسهم في التنمية الاقتصادية والاجتماعية وفي تحسين
          معيشة الفرد والمجتمع عن طريق خدمات مالية متنوعة ،
          وبخبرات متراكمة تزيد عن أربعين عاما أسس هذا الصرح
          الاقتصادي ليقدم خدماته للمواطنين بجميع المحافظات'
      ],
      'who_are_we' => [
        'ar' => $lorem_text,
        'en' => $lorem_text
      ],
      'vision' => [
        'ar' => $lorem_text,
        'en' => $lorem_text
      ],
      'message' => [
        'ar' => $lorem_text,
        'en' => $lorem_text
      ],
      'clarity_transparency' => [
        'ar' => $lorem_text,
        'en' => $lorem_text
      ],
      'purpose' => [
        'ar' => $lorem_text,
        'en' => $lorem_text
      ],
      'commitment' => [
        'ar' => $lorem_text,
        'en' => $lorem_text
      ],
      'image' => 'about-us.png',
    ]);
  }
}
