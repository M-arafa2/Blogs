<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Service::truncate();
        $services = [
            ['name' => 'خدمه1','status' => 1,'cover' => '1.jpg'],
            ['name' => 'خدمه 2','status' => 1,'cover' => '2.jpg'],
            ['name' => 'خدمه3','status' => 1,'cover' => '3.jpg'],
        ];
        foreach ($services as $key => $value) {
            Service::create($value);
        }
    }
}
