<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(20)->create();

        $categories = array ('Web Design','HTML','Freebies','JavaScript','CSS','Tutorials');
        foreach($categories as $category) {
            Category::factory()->create([
                'name' => $category,
            ]);
        }

        Post::all()->each(function ($post) {
            $post->categories()->attach(
                Category::all()->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}