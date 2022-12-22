<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Comment;
        $c->body = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie at elit blandit convallis. Phasellus cursus risus et tortor gravida, a suscipit tellus tincidunt. Integer id scelerisque arcu. Aliquam ac ante lacus. Vestibulum maximus tortor sed metus porttitor, ut interdum eros blandit. Mauris pellentesque ultricies cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris gravida congue magna, eget tincidunt elit feugiat at. Pellentesque eu orci non risus interdum lobortis non eu urna. Sed ut auctor ligula. Etiam ut tellus vel mauris tempus interdum a vitae est. Aliquam faucibus, dolor a sollicitudin interdum, purus tellus ullamcorper massa, at condimentum erat tortor sed nisi.';
        $c->user_id = 1;
        $c->post_id = 1;
        $c->save();

        $c1 = new Comment;
        $c1->body = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie at elit blandit convallis. Phasellus cursus risus et tortor gravida, a suscipit tellus tincidunt. Integer id scelerisque arcu. Aliquam ac ante lacus. Vestibulum maximus tortor sed metus porttitor, ut interdum eros blandit. Mauris pellentesque ultricies cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris gravida congue magna, eget tincidunt elit feugiat at. Pellentesque eu orci non risus interdum lobortis non eu urna. Sed ut auctor ligula. Etiam ut tellus vel mauris tempus interdum a vitae est. Aliquam faucibus, dolor a sollicitudin interdum, purus tellus ullamcorper massa, at condimentum erat tortor sed nisi.';
        $c1->user_id = 2;
        $c1->post_id = 1;
        $c1->save();

        Comment::factory()->count(400)->create();



    }
}
