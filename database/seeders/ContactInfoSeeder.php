<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ContactInfo::create([
      'key'   => 'phone',
      'value' => '777888999'
    ]);

    ContactInfo::create([
      'key'   => 'fax',
      'value' => '123456'
    ]);

    ContactInfo::create([
      'key'   => 'free_phone',
      'value' => '123456'
    ]);

    ContactInfo::create([
      'key'   => 'mail_box',
      'value' => '19357'
    ]);

    ContactInfo::create([
      'key'   => 'email',
      'value' => 'bank@bank.com'
    ]);
  }
}
