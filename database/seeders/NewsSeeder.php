<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Create news.
     */
    public function run(): void
    {
        News::factory()->count(6)->create();
    }
}
