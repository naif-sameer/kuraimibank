<?php

namespace Database\Seeders;

use App\Models\TeamRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamRoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    TeamRole::create(
      [
        'title' => [
          'ar' => 'مجلس الإدارة',
          'en' => 'مجلس الإدارة',
        ],
        'description' => [
          'ar' => 'يتشكل مجلس الإدارة من مجموعة من الأعضاء ذو
              خبرات في مجالات مختلفة تساهم بشكل كبير من
              قيادة البنك إلى التقدم بخط ً ثابتة نحو النجاح و تحقيق
              أهدافه. وأعضاء مجلس الإدارة هم',
          'en' => 'يتشكل مجلس الإدارة من مجموعة من الأعضاء ذو
              خبرات في مجالات مختلفة تساهم بشكل كبير من
              قيادة البنك إلى التقدم بخط ً ثابتة نحو النجاح و تحقيق
                أهدافه. وأعضاء مجلس الإدارة هم',
        ]
      ]
    );


    TeamRole::create([
      'title' => [
        'ar' => 'هيئة الرقابة الشرعية البنك',
        'en' => 'هيئة الرقابة الشرعية البنك',
      ],
    ]);

    TeamRole::create([
      'title' => [
        'ar' => 'المحاسبون القانونيون',
        'en' => 'المحاسبون القانونيون',
      ],
    ]);
  }
}
