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
        $u = new User;
        $u->name = 'Sam';
        $u->email = 'samsblog@email.com';
        $u->password = 'password';
        $u->save();

        $u2 = new User;
        $u2->name = 'tom';
        $u2->email = 'tomsblog@email.com';
        $u2->password = 'differentpassword';
        $u2->save();

        $post = Post::factory();
        $user = User::factory()
            // ->hasPosts(3, function (array $attributes , User $user){
            //     return ['user_id' => $user->id];
            // })
            ->has(
                $post
                ->count(3)
                ->state(function(array $attributes , User $user){
                    return ['user_id' => $user->id];
                })
                ->hasPostPictures(2, function(array $attributes , Post $post){
                    return['post_id' => $post->id];
                })
            )

            ->hasProfilePicture(1, function(array $attributes , User $user){
                return ['user_id' => $user->id];
            })
            ->count(20)->create();
    }
}
