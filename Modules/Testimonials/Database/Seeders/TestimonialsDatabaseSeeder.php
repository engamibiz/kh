<?php

namespace Modules\Testimonials\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TestimonialsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(TestimonialsModuleModuleSeeder::class);
        $this->call(TestimonialsModulePermissionsSeeder::class);
        $this->call(TestimonialsModuleUserPermissionsSeeder::class);
        $this->call(TestimonialsModuleGroupPermissionsSeeder::class);
    }
}
