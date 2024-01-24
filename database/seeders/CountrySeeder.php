<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Occupation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Country::truncate();
        City::truncate();
        Occupation::truncate();

        Country::create(['name' => 'السعودية']);
        Country::create(['name' => 'مصر']);
        Country::create(['name' => 'الإمارات']);

        City::create(['name' => 'جدة', 'country_id' => 1]);
        City::create(['name' => 'الرياض', 'country_id' => 1]);
        City::create(['name' => 'القاهرة', 'country_id' => 2]);
        City::create(['name' => 'دبي', 'country_id' => 3]);

        Occupation::create(['name' => 'عميل وظيفة 1', 'type' => 'user']);
        Occupation::create(['name' => 'عميل وظيفة 2', 'type' => 'user']);
        Occupation::create(['name' => 'عميل وظيفة 3', 'type' => 'user']);
        Occupation::create(['name' => 'محامي وظيفة 1', 'type' => 'vendor']);
        Occupation::create(['name' => 'محامي وظيفة 2', 'type' => 'vendor']);
        Occupation::create(['name' => 'محامي وظيفة 3', 'type' => 'vendor']);
        Occupation::create(['name' => 'محكم وظيفة 1', 'type' => 'judger']);
        Occupation::create(['name' => 'محكم وظيفة 2', 'type' => 'judger']);
        Occupation::create(['name' => 'محكم وظيفة 3', 'type' => 'judger']);
    }
}
