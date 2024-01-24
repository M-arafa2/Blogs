<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Sitepage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SitepageSeeder extends Seeder
{
    public function run()
    {
        Sitepage::truncate();
        Sitepage::create([
            'address' => 'عنوان الموقع 1',
            'content' => 'نرحب بكم فى موقعنا',
            'status' => Sitepage::ACTIVE,
        ]);
    }
}
