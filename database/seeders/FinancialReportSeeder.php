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
    ]);

    FinancialReport::create([
      'year' => 2017,
      'pdf' => '16558460136038325.pdf',
    ]);

    FinancialReport::create([
      'year' => 2018,
      'pdf' => '16558460136038325.pdf',
    ]);

    FinancialReport::create([
      'year' => 2019,
      'pdf' => '16558460136038325.pdf',
    ]);

    FinancialReport::create([
      'year' => 2020,
      'pdf' => '16558460136038325.pdf',
    ]);

    FinancialReport::create([
      'year' => 2021,
      'pdf' => '16558460136038325.pdf',
    ]);
  }
}
