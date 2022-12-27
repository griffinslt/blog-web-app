<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Commenter extends Component
{

    public $users;
    public $post;

    public $oldComments;

    

    public $comments = [];

    //public $commentsAsArray = $this->comments->get()->toArray();

    public $newComment;



    public function addComment()
    {

        if ($this->newComment) {


            array_unshift($this->comments, [
                'body' => $this->newComment,
                'post_id' => $this->post->id,
                'user_id' => auth()->user()->id,

            ]);

            $c = [
                'body' => $this->newComment,
                'post_id' => $this->post->id,
                'user_id' => auth()->user()->id,

            ];


            Comment::create($c);


            $this->newComment = "";
        }



    }
    

    public function save()
    {
        
    }

    public function delete()
    {
        # code...
    }
    public function render()
    {
        return view('livewire.commenter');
    }
}
