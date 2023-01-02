<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
        $u->name = 'admin';
        $u->email = 'admin@blogs.com';
        $u->password = bcrypt('password');

        $u->save();

        $u2 = new User();
        $u2->name = 'tom';
        $u2->email = 'tomsblog@email.com';
        $u2->password = bcrypt('password1');
        $u2->save();

        $u3 = new User();
        $u3->name = 'jim';
        $u3->email = 'jimsblog@email.com';
        $u3->password = bcrypt('password2');
        $u3->save();

        $post = Post::factory();
        $user = User::factory()
            // ->hasPosts(3, function (array $attributes , User $user){
            //     return ['user_id' => $user->id];
            // })
            ->has(
                $post
                    ->count(3)
                    ->state(function (array $attributes, User $user) {
                        return ['user_id' => $user->id];
                    })
                    ->hasPostPictures(2, function (array $attributes, Post $post) {
                        return ['post_id' => $post->id];
                    }),
            )

            ->hasProfilePicture(1, function (array $attributes, User $user) {
                return ['user_id' => $user->id];
            })
            ->count(20)
            ->create();
    }
}
