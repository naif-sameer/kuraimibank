<?php

namespace Database\Seeders;

use App\Models\ExchangeRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExchangeRateSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ExchangeRate::create([
      "title" => ["ar" => "دولار", "en" => "Dollar"],
      "sale"  => 558.00,
      "buy"   => 559.00
    ]);

    ExchangeRate::create([
      "title" => ["ar" => "اليورو", "en" => "Euro"],
      "sale"  => 584.59,
      "buy"   => 582.59
    ]);

    ExchangeRate::create([
      "title" => ["ar" => "الريال السعودي", "en" => "Saudi riyal"],
      "sale"  => 148.20,
      "buy"   => 148.40
    ]);
  }
}
