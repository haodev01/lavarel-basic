<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
  protected $model = Blog::class;

  public function definition()
  {
    return [
      'title' => $this->faker->sentence,
      'slug' => Str::slug($this->faker->sentence),
      'description' => $this->faker->paragraph,
      'thumb' => 'https://media.dev.to/cdn-cgi/image/width=1000,height=420,fit=cover,gravity=auto,format=auto/https%3A%2F%2Fdev-to-uploads.s3.amazonaws.com%2Fuploads%2Farticles%2Fjnqnkth1mkxy4skoscx7.png'
    ];
  }
}
