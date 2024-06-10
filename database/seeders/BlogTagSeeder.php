<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $blogs = Blog::factory()->count(10)->create();
        $tags = Tag::factory()->count(5)->create();
        foreach ($blogs as $blog) {
            // Random số lượng tag để gắn cho mỗi blog
            $randomTags = $tags->random(rand(1, 3))->pluck('id')->toArray();
            $blog->tags()->attach($randomTags);
        }
    }
}
