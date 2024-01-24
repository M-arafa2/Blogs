<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::truncate();
        Slider::create([
            'title'    => 'site address 1',
            // 'subtitle' => 'welcome to our site',
            'cover'    => '99.jpg'
        ]);
        Slider::create([
            'title'    => 'site address 2',
            // 'subtitle' => 'welcome to our site',
            'cover'    => '100.jpg'
        ]);
        Slider::create([
            'title'    => 'site address 3',
            // 'subtitle' => 'welcome to our site',
            'cover'    => '102.jpg'
        ]);

    }
}
