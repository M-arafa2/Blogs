<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $user = User::create([
            'type' => 'admin',
            'name' => 'مراسيم',
            'gender' => 'male',
            'email' => 'admin@admin.com',
            'phone' => '0100000000',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'country_id' => 1,
            'city_id' => 1,
            // 'image'             => 'avatar.svg',
            // 'occasion'             => 'فرح',

        ]);
        $user = User::create([
            'type' => 'user',
            'name' => 'user',
            'gender' => 'male',
            'email' => 'user@admin.com',
            'phone' => '0100033333',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'country_id' => 1,
            'city_id' => 1,
            // 'image'             => 'avatar.svg',
            // 'occasion'             => 'فرح',
        ]);
        $user = User::create([
            'type' => 'vendor',
            'name' => 'vendor',
            'gender' => 'male',
            'email' => 'vendor@admin.com',
            'phone' => '0100044444',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'country_id' => 1,
            'city_id' => 1,
            // 'image'             => 'avatar.svg',
            // 'occasion'             => 'فرح',
        ]);
    }
}
