<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PackageModulesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed --class=PackageModulesTableDataSeeder

        DB::table('package_modules')->insert([
            // Basic Package
            [
                'package_id' => 1,
                'module_id' => 1,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
