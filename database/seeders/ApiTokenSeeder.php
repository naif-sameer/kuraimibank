<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApiTokenSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('personal_access_tokens')->create([
      'tokenable'        => 'App\Models\User',
      'name'             => 'api token',
      'token'            => 'e7e902e311bd87184247b37db36d894c0b121949007a590f4b9aa63154676828',
    ]);
  }
}
