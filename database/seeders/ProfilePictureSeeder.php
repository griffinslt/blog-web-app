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
        $p->file_path = 'Users/sam/fakefile.png';
        $p->user_id = 1;
        $p->save();

        ProfilePicture::factory()->count(50)->create();

    }
}
