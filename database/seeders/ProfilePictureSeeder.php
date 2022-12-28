<?php

namespace Database\Seeders;

use App\Models\ProfilePicture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilePictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new ProfilePicture;
        $p->file_path = url("images/blank-profile-picture.png");
        $p->user_id = 1;
        $p->save();

        $p2 = new ProfilePicture;
        $p2->file_path = 'https://via.placeholder.com/300/09f.png/fff';
        $p2->user_id = 2;
        $p2->save();


    }
}
