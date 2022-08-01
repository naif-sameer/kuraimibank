<?php

namespace Database\Seeders;

use App\Models\page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    page::create([
      "table_key" => "privacy_policy",
      "title" => [
        "ar" => "arabic here",
        "en" => "english"
      ],
      "sub_title" => [
        "ar" => "arabic here",
        "en" => "english"
      ],
      "description" => [
        "ar" => "arabic here",
        "en" => "english"
      ]
    ]);
  }
}
