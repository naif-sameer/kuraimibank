<?php

namespace Database\Seeders;

use App\Models\WebsiteInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteInfoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    WebsiteInfo::create(
      [
        'table_key'     => 'apply_for_service',
        'table_value'   => [
          "ar" => "<p>apply_for_service</p>",
          "en" => "<p>apply_for_service</p>"
        ],
        'created_at'    => now()
      ],
    );

    WebsiteInfo::create(
      [
        'table_key'     => 'contact_us_phone',
        'table_value'   => [
          "phone" => 123,
          "fax" => 234,
          "free_phone" => 123456,
          "mail_box" => "bla bla",
          "email" => "bank@bank.com"
        ],
        'created_at'    => now()
      ],
    );

    WebsiteInfo::create([
      'table_key'     => 'about_us',
      'table_value'   => [
        "ar" => "<p>about_us</p>",
        "en" => "<p>about_us</p>"
      ],
      'created_at'    => now()
    ]);

    WebsiteInfo::create(
      [
        'table_key'     => 'values_principles',
        'table_value'   => [
          "ar" => "<p>values_principles</p>",
          "en" => "<p>values_principles</p>"
        ],
        'created_at'    => now()
      ],
    );

    WebsiteInfo::create(
      [
        'table_key'     => 'strategy_statement',
        'table_value'   => [
          "ar" => "<p>strategy_statement</p>",
          "en" => "<p>strategy_statement</p>"
        ],
        'created_at'    => now()
      ],
    );

    WebsiteInfo::create(
      [
        'table_key'     => 'board_members',
        'table_value'   => [
          "ar" => "<p>board_members</p>",
          "en" => "<p>board_members</p>"
        ],
        'created_at'    => now()
      ],
    );

    WebsiteInfo::create(
      [
        'table_key'     => 'service_points_title',
        'table_value'   => [
          "ar" => "الفروع وماكينات الصرافة",
          "en" => "Branches and ATMs"
        ],
        'created_at'    => now()
      ],
    );

    WebsiteInfo::create(
      [
        'table_key'     => 'service_points_description',
        'table_value'   => [
          "ar" => "خدماتنا قريبة منك ومتاحة في أكثر من
        ٦٠٠ نقطة حول الجمهورية اليمنية",
          "en" => "Our services are close to you and available in more than
        600 points around the Republic of Yemen",
        ],
        'created_at'    => now()
      ],
    );
  }
}
