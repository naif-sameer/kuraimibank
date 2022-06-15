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
            'title'             => '{"ar": "سياسية الخصوصية"}',
            'sub_title'         => '{"ar": "تعد خصوصيتك من الأمور الهامة التي يعني بها بنك الكريمي للتمويل"}',
            'description'       => '{"ar": "جمع المعلومات الشخصية"}',
        ]);
    }
}
