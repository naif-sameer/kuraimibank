<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    TeamMember::create([
      'name' => 'هشام محمود الحاج',
      'image' => 'team-1.png',
      'role' => [
        'ar' => 'رئيس المجلس',
        'en' => 'رئيس المجلس',
      ],
      'team_role_id' => 1
    ]);

    TeamMember::create([
      'name' => 'ماجيد سند السماوي',
      'image' => 'team-2.png',
      'role' => [
        'ar' => 'نائب رئيس المجلس',
        'en' => 'نائب رئيس المجلس',
      ],
      'team_role_id' => 1
    ]);

    TeamMember::create([
      'name' => 'علي محمد علي الشميري',
      'image' => 'team-3.png',
      'role' => [
        'ar' => 'عضو',
        'en' => 'عضو',
      ],
      'team_role_id' => 1
    ]);

    TeamMember::create([
      'name' => 'وليد محمد احمد',
      'image' => 'team-4.png',
      'role' => [
        'ar' => 'عضو',
        'en' => 'عضو',
      ],
      'team_role_id' => 1
    ]);

    TeamMember::create([
      'name' => 'محمد عبداالله نايف',
      'image' => 'team-5.png',
      'role' => [
        'ar' => 'عضو',
        'en' => 'عضو',
      ],
      'team_role_id' => 1
    ]);

    /****************************************/

    TeamMember::create([
      'name' => 'هشام محمود الحاج',
      'image' => 'team-1.png',
      'role' => [
        'ar' => 'رئيس المجلس',
        'en' => 'رئيس المجلس',
      ],
      'team_role_id' => 2
    ]);

    TeamMember::create([
      'name' => 'ماجيد سند السماوي',
      'image' => 'team-4.png',
      'role' => [
        'ar' => 'نائب رئيس المجلس',
        'en' => 'نائب رئيس المجلس',
      ],
      'team_role_id' => 2
    ]);

    TeamMember::create([
      'name' => 'علي محمد علي الشميري',
      'image' => 'team-5.png',
      'role' => [
        'ar' => 'عضو',
        'en' => 'عضو',
      ],
      'team_role_id' => 2
    ]);

    /****************************************/


    TeamMember::create([
      'name' => 'هشام محمود الحاج',
      'image' => 'team-8.png',
      'role' => [
        'ar' => 'رئيس المجلس',
        'en' => 'رئيس المجلس',
      ],
      'team_role_id' => 3
    ]);

    TeamMember::create([
      'name' => 'ماجيد سند السماوي',
      'image' => 'team-7.png',
      'role' => [
        'ar' => 'نائب رئيس المجلس',
        'en' => 'نائب رئيس المجلس',
      ],
      'team_role_id' => 3
    ]);

    TeamMember::create([
      'name' => 'علي محمد علي الشميري',
      'image' => 'team-6.png',
      'role' => [
        'ar' => 'عضو',
        'en' => 'عضو',
      ],
      'team_role_id' => 3
    ]);
  }
}
