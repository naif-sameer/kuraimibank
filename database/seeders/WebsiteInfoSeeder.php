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

    /***************** home page  ******************/
    WebsiteInfo::create(
      [
        'table_key'     => 'home_title',
        'table_value'   => [
          'ar' => 'حساب في كل بيت يمني',
          'en' => 'An account in every Yemeni house'
        ],
        'created_at'    => now()
      ],
    );
    WebsiteInfo::create(
      [
        'table_key'     => 'home_description',
        'table_value'   => [
          'ar' => 'يسهم في التنمية الاقتصادية والاجتماعية',
          'en' => 'Contributes to economic and social development'
        ],
        'created_at'    => now()
      ],
    );

    WebsiteInfo::create(
      [
        'table_key'     => 'home_bank_app_description',
        'table_value'   => [
          'ar' => 'تطبيق الكريمي جوال يساعدك على إدارة حساباتك في بنك الكريمي للتمويل الأصغر الإسلامي حيث يمكنك من إرسال الحوالات والتحويل بين الحسابات وتبديل العملات بين حساباتك وسداد فواتير الخدمات عبر الجوال في أي وقت',
          'en' => 'Al-Kuraimi Mobile Application helps you manage your accounts in Al-Kuraimi Islamic Microfinance Bank, where you can send transfers, transfer between accounts, exchange currencies between your accounts, and pay utility bills via mobile at any time.'
        ],
        'created_at'    => now()
      ],
    );


    /*****************  page  ******************/
    WebsiteInfo::create(
      [
        'table_key'     => 'apply_for_service',
        'table_value'   => [
          'ar' => '<p>apply_for_service</p>',
          'en' => '<p>apply_for_service</p>'
        ],
        'created_at'    => now()
      ],
    );


    WebsiteInfo::create([
      'table_key'     => 'about_us',
      'table_value'   => [
        'ar' => '<p>about_us</p>',
        'en' => '<p>about_us</p>'
      ],
      'created_at'    => now()
    ]);

    WebsiteInfo::create(
      [
        'table_key'     => 'values_principles',
        'table_value'   => [
          'ar' => '<p>values_principles</p>',
          'en' => '<p>values_principles</p>'
        ],
        'created_at'    => now()
      ],
    );

    WebsiteInfo::create(
      [
        'table_key'     => 'strategy_statement',
        'table_value'   => [
          'ar' => '<p>strategy_statement</p>',
          'en' => '<p>strategy_statement</p>'
        ],
        'created_at'    => now()
      ],
    );

    WebsiteInfo::create(
      [
        'table_key'     => 'board_members',
        'table_value'   => [
          'ar' => '<p>board_members</p>',
          'en' => '<p>board_members</p>'
        ],
        'created_at'    => now()
      ],
    );

    WebsiteInfo::create(
      [
        'table_key'     => 'service_points_title',
        'table_value'   => [
          'ar' => 'الفروع وماكينات الصرافة',
          'en' => 'Branches and ATMs'
        ],
        'created_at'    => now()
      ],
    );

    WebsiteInfo::create(
      [
        'table_key'     => 'service_points_description',
        'table_value'   => [
          'ar' => 'خدماتنا قريبة منك ومتاحة في أكثر من
        ٦٠٠ نقطة حول الجمهورية اليمنية',
          'en' => 'Our services are close to you and available in more than
        600 points around the Republic of Yemen',
        ],
        'created_at'    => now()
      ],
    );
  }
}
