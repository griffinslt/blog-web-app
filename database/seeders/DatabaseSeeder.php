<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
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
        //$this->call(ProfilePictureSeeder::class);
        $this->call(CommentSeeder::class);
        //$this->call(PostPictureSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PictureSeeder::class);

        foreach (range(1, 150) as $_) {
            try {
                DB::table('category_post')->insert([
                    'category_id' => rand(1, count(Category::all())),
                    'post_id' => rand(1, count(Post::all())),
                ]);
            } catch (\Illuminate\Database\QueryException $ex) {
                //
            }
        }

        $users = User::all();
        $roles = Role::all();

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => $roles->where('role_name', '=', 'admin')->first()->id,
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => $roles->where('role_name', '=', 'comment_moderator')->first()->id,
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => $roles->where('role_name', '=', 'post_moderator')->first()->id,
        ]);

        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => $roles->where('role_name', '=', 'comment_moderator')->first()->id,
        ]);



        foreach ($users as $user) {
            if ($user->email != 'admin@blogs.com') {
                DB::table('role_user')->insert([
                    'user_id' => $user->id,
                    'role_id' => $roles->where('role_name', '=', 'normal')->first()->id,
                ]);
            }
        }
    }
}
