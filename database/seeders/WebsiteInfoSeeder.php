<?php

namespace Database\Seeders;

use App\Models\WebsiteInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteInfo::insert([
            [
                'table_key'     => 'apply_for_service',
                'table_value'     => '{"ar": "<p>apply_for_service</p>", "en": "<p>apply_for_service</p>"}',
            ],


            [
                'table_key'     => 'contact_us',
                'table_value'     => '{"phone":123,"fax":234,"free_phone":123456,"mail_box":"bla bla","email":"email"}',
            ],

            [
                'table_key'     => 'about_us',
                'table_value'     => '{"ar": "<p>about_us</p>", "en": "<p>about_us</p>"}',
            ],
            [
                'table_key'     => 'values_principles',
                'table_value'     => '{"ar": "<p>values_principles</p>", "en": "<p>values_principles</p>"}',
            ],
            [
                'table_key'     => 'strategy_statement',
                'table_value'     => '{"ar": "<p>strategy_statement</p>", "en": "<p>strategy_statement</p>"}',
            ],
            [
                'table_key'     => 'board_members',
                'table_value'     => '{"ar": "<p>board_members</p>", "en": "<p>board_members</p>"}',
            ],


        ]);
    }
}
