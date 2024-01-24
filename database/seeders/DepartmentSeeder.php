<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Subdepartment;
use App\Models\Subsubdepartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
$clothes = Department::create(['name' => 'Clothes', 'cover' => 'clothes.jpg', 'status' => true, 'parent_id' => null]);
Department::create(['name' => 'Women\'s T-Shirts', 'cover' => 'clothes.jpg', 'status' => true, 'parent_id' => $clothes->id]);
Department::create(['name' => 'Men\'s T-Shirts', 'cover' => 'clothes.jpg', 'status' => true, 'parent_id' => $clothes->id]);

$shoes = Department::create(['name' => 'Shoes', 'cover' => 'shoes.jpg', 'status' => true]);
Department::create(['name' => 'Women\'s Shoes', 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $shoes->id]);
Department::create(['name' => 'Men\'s Shoes', 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $shoes->id]);

$watches = Department::create(['name' => 'Watches', 'cover' => 'watches.jpg', 'status' => true]);
Department::create(['name' => 'Women\'s Watches', 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $watches->id]);
Department::create(['name' => 'Men\'s Watches', 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $watches->id]);

$electronics = Department::create(['name' => 'Electronics', 'cover' => 'electronics.jpg', 'status' => true]);
Department::create(['name' => 'Electronics', 'cover' => 'electronics.jpg', 'status' => true, 'parent_id' => $electronics->id]);
Department::create(['name' => 'USB Flash drives', 'cover' => 'electronics.jpg', 'status' => true, 'parent_id' => $electronics->id]);

        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Department::truncate();
        // $departments = [
        //     ['name' => 'الاتصالات','status' => 1,'cover' => '1.jpg'],
        //     ['name' => 'الاستشارات','status' => 1,'cover' => '2.jpg'],
        //     ['name' => 'المحاماه','status' => 1,'cover' => '3.jpg'],
        // ];
        // foreach ($departments as $key => $value) {
        //     Department::create($value);
        // }


    }
}


