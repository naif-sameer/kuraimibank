<?php

namespace Database\Seeders;

use App\Models\FinancialReport;
use Illuminate\Database\Seeder;

class FinancialReportSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    FinancialReport::create([
      'year' => 2016,
      'pdf' => '16558460136038325.pdf',
      'title' => [
        'ar' => '2016',
        'en' => '2016'
      ],
    ]);

    FinancialReport::create([
      'year' => 2017,
      'pdf' => '16558460136038325.pdf',
      'title' => [
        'ar' => '2017',
        'en' => '2017'
      ],
    ]);

    FinancialReport::create([
      'year' => 2018,
      'pdf' => '16558460136038325.pdf',
      'title' => [
        'ar' => '2018',
        'en' => '2018'
      ],
    ]);

    FinancialReport::create([
      'year' => 2019,
      'pdf' => '16558460136038325.pdf',
      'title' => [
        'ar' => '2019',
        'en' => '2019'
      ],
    ]);

    FinancialReport::create([
      'year' => 2020,
      'pdf' => '16558460136038325.pdf',
      'title' => [
        'ar' => '2020',
        'en' => '2020'
      ],
    ]);

    FinancialReport::create([
      'year' => 2021,
      'pdf' => '16558460136038325.pdf',
      'title' => [
        'ar' => '2021',
        'en' => '2021'
      ],
    ]);
  }
}
