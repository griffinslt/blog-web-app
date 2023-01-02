<?php

namespace Database\Seeders;

use App\Models\Picture;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile_picture = new Picture;
        $profile_picture->file_path = url("images/blank-profile-picture.png");
        $profile_picture->pictureable_id = 1;
        $profile_picture->pictureable_type = User::class;
        $profile_picture->save();

        $p2 = new Picture;
        $p2->file_path = 'https://via.placeholder.com/300/09f.png/fff';
        $p2->pictureable_id = 2;
        $p2->pictureable_type = User::class;
        $p2->save();

        $p3 = new Picture;
        $p3->file_path = 'https://via.placeholder.com/300/09f.png/fff';
        $p3->pictureable_id = 3;
        $p3->pictureable_type = User::class;
        $p3->save();

        $post_picture = new Picture;
        $post_picture->file_path = 'https://via.placeholder.com/300/09f.png/fff';
        $post_picture->pictureable_id = 1;
        $post_picture->pictureable_type = Post::class;
        $post_picture->save();


        $post_picture = new Picture;
        $post_picture->file_path = 'https://via.placeholder.com/300/09f.png/fff';
        $post_picture->pictureable_id = 1;
        $post_picture->pictureable_type = Post::class;
        $post_picture->save();

        //$post = Post::factory()->hasPictures(3)->create();


    }
}
