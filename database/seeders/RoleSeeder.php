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
        $admin->role_name = 'admin';
        $admin->save();

        $post_moderator = new Role;
        $post_moderator->role_name = 'post_moderator';
        $post_moderator->save();

        $comment_moderator = new Role;
        $comment_moderator->role_name = 'comment_moderator';
        $comment_moderator->save();

        $normal_user = new Role;
        $normal_user->role_name = 'normal';
        $normal_user->save();



    
    }
}
