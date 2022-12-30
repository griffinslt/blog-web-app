<?php

namespace Database\Seeders;

use App\Models\PostPicture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pp = new PostPicture;
        $pp->file_path = url("https://picsum.photos/200/300");
        $pp->post_id = 1;
        $pp->save();

        $pp = new PostPicture;
        $pp->file_path = url("https://picsum.photos/200");
        $pp->post_id = 1;
        $pp->save();

    }
}
