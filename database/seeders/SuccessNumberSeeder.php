<?php

namespace Database\Seeders;

use App\Models\SuccessNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuccessNumberSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    SuccessNumber::create([
      'title'       => '5000',
      'description' => [
        'ar' => 'تمويل عقاري تم تمويله تمويل شامل',
        'en' => 'Fully financed real estate financing',
      ],
    ]);
    SuccessNumber::create([
      'title'       => '4000',
      'description' => [
        'ar' => 'تمويل عقاري تم تمويله تمويل شامل',
        'en' => 'Fully financed real estate financing',
      ],
    ]);
    SuccessNumber::create([
      'title'       => '3000',
      'description' => [
        'ar' => 'تمويل عقاري تم تمويله تمويل شامل',
        'en' => 'Fully financed real estate financing',
      ],
    ]);
    SuccessNumber::create([
      'title'       => '900',
      'description' => [
        'ar' => 'تمويل عقاري تم تمويله تمويل شامل',
        'en' => 'Fully financed real estate financing',
      ],
    ]);
    SuccessNumber::create([
      'title'       => '200',
      'description' => [
        'ar' => 'تمويل عقاري تم تمويله تمويل شامل',
        'en' => 'Fully financed real estate financing',
      ],
    ]);
    SuccessNumber::create([
      'title'       => '300',
      'description' => [
        'ar' => 'تمويل عقاري تم تمويله تمويل شامل',
        'en' => 'Fully financed real estate financing',
      ],
    ]);
    SuccessNumber::create([
      'title'       => '100',
      'description' => [
        'ar' => 'تمويل عقاري تم تمويله تمويل شامل',
        'en' => 'Fully financed real estate financing',
      ],
    ]);

    SuccessNumber::create([
      'title'       => '5000',
      'description' => [
        'ar' => 'تمويل عقاري تم تمويله تمويل شامل',
        'en' => 'Fully financed real estate financing',
      ],
    ]);
  }
}
