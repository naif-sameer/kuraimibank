<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      AboutUsSeeder::class,
      ContactInfoSeeder::class,
      ExchangeRateSeeder::class,
      FinancialReportSeeder::class,
      NewsSeeder::class,
      OurPartnerSeeder::class,
      ServicesSeeder::class,
      TeamRoleSeeder::class,
      TeamMemberSeeder::class,
      UserSeeder::class,
      WebsiteInfoSeeder::class,
    ]);
  }
}
