<?php

namespace Database\Seeders;

use App\Models\Blogs;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Create blogs.
     */
    public function run(): void
    {
        Blogs::factory()->count(6)->create();
    }
}
