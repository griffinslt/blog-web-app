<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role;
        $admin->role = 'admin';

        $post_moderator = new Role;
        $post_moderator->role = 'post_moderator';

        $comment_moderator = new Role;
        $comment_moderator->role = 'comment_moderator';


        $normal_user = new Role;
        $normal_user->role = 'normal';



    
    }
}
