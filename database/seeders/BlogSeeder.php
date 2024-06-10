<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Blog::create([
                'title' => 'Blog Title ' . ($i + 1),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.',
                'thumb' => 'https://miro.medium.com/v2/resize:fit:720/format:webp/0*svNoVRbgh7m9hNH4',
                'slug' => 'slug' . $i
            ]);
        }
    }
}
