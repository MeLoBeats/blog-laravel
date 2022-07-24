<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(10)->create();
        $users = User::factory(15)->create();
        Post::factory(20)->create([
            'user_id' => ($users->random(1)->first())->id,
            'category_id' => ($categories->random(1)->first())->id
        ])->each(function ($post) use ($users) {
            Comment::factory(rand(0, 2))->create([
                "post_id" => $post->id,
                'user_id' => ($users->random(1)->first())->id,
            ]);
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
