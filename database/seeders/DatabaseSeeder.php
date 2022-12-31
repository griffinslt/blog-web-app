<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ProfilePictureSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(PostPictureSeeder::class);
        $this->call(CategorySeeder::class);

        foreach (range(1, 100) as $index) {
            try {
                DB::table('category_post')->insert([
                    'category_id' => rand(1, count(Category::all()) - 1),
                    'post_id' => rand(1, count(Post::all()) - 1),
                ]);
            } catch (\Illuminate\Database\QueryException $ex) {
                //
            }
        }
    }
}
