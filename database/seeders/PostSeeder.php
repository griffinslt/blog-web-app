<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Post;
        $p->title = 'first-blog';
        $p->body = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ante ipsum, tincidunt non orci sed, pulvinar convallis mi. Vivamus sed hendrerit sem. Vivamus fermentum est ut metus imperdiet auctor. Duis sit amet nulla at tortor dignissim scelerisque. Proin eu nunc convallis, ornare diam nec, gravida nibh. Proin ac augue purus. Cras consectetur vulputate varius. Mauris posuere tellus eu ullamcorper porta. Nullam ultrices auctor felis id suscipit.';
        $p->user_id = 1;
        $p->save();

        $p = new Post;
        $p->title = 'second-blog';
        $p->body = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ante ipsum, tincidunt non orci sed, pulvinar convallis mi. Vivamus sed hendrerit sem. Vivamus fermentum est ut metus imperdiet auctor. Duis sit amet nulla at tortor dignissim scelerisque. Proin eu nunc convallis, ornare diam nec, gravida nibh. Proin ac augue purus. Cras consectetur vulputate varius. Mauris posuere tellus eu ullamcorper porta. Nullam ultrices auctor felis id suscipit.';
        $p->user_id = 2;
        $p->save();

    

    
    }
}
