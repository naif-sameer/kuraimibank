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
      UserSeeder::class,
      WebsiteInfoSeeder::class,
      NewsSeeder::class,
      ExchangeRateSeeder::class,
      ServicesSeeder::class,
      OurPartnerSeeder::class,
      FinancialReportSeeder::class,
      AboutUsSeeder::class
    ]);
  }
}
