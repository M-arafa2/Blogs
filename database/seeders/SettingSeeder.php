<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        Setting::create(['key' => 'website_name', 'value' => 'مراسيم',]);
        Setting::create(['key' => 'link', 'value' => 'https://mrasim.com/',]);
        Setting::create(['key' => 'website_active', 'value' => 1,]);
        Setting::create(['key' => 'tax_number', 'value' => 55555,]);
        Setting::create(['key' => 'address', 'value' => 'Egypt',]);
        Setting::create(['key' => 'phone', 'value' => '+9222222222222222',]);
        Setting::create(['key' => 'record_number', 'value' => '33333',]);
        Setting::create(['key' => 'build_no', 'value' => '444',]);
        Setting::create(['key' => 'whats', 'value' => 9222222222222222,]);
        Setting::create(['key' => 'facebook', 'value' => 'https://facebook.com/',]);
        Setting::create(['key' => 'twitter', 'value' => 'https://twitter.com/',]);
        Setting::create(['key' => 'instagram', 'value' => 'https://instagram.com/',]);

        Setting::create(['key' => 'website_inactive_message', 'value' => 'نعتذر الموقع مغلق للصيانة ....!!',]);
        Setting::create(['key' => 'logo', 'value' => 'afrah.png',]);
        Setting::create(['key' => 'site_icon', 'value' => 'afrah.jpg',]);
        Setting::create(['key' => 'support_mail', 'value' => 'm@gmail.com',]);
        Setting::create(['key' => 'vendor_offers', 'value' => 5,]);
        Setting::create(['key' => 'coordinator_offers', 'value' => 5,]);
        Setting::create(['key' => 'about', 'value' => 'حول التطبيق',]);
        Setting::create(['key' => 'terms_of_use_client', 'value' => 'شروط الاستخدام',]);
        Setting::create(['key' => 'terms_of_use_vendor', 'value' => 'شروط الاستخدام',]);
    }
}
