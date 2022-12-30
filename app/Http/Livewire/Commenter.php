<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Commenter extends Component
{

    public $users;
    public $post;

    public $comments;

    public $dbComments;

    protected $listeners = ['refreshComponent' => '$refresh'];


    //public $commentsAsArray = $this->comments->get()->toArray();

    public $newComment;

    public $userEmail;



    public function addComment()
    {

        if ($this->newComment) {


            

            $c = [
                'body' => $this->newComment,
                'post_id' => $this->post->id,
                'user_id' => auth()->user()->id,

            ];


            Comment::create($c);
            
            // $this->comments = Comment::where('post_id', '=', $this->post->id)->get()->toArray();

            // $this->emitSelf("refreshComponent");
            $this->refresh();


            foreach ($this->users as $postUser) {
                if ($postUser->id == $this->post['user_id']) {
                    $this->userEmail = $postUser->email;
                    break;
                }
            }
            if (auth()->user()->email != $this->userEmail) {
                Mail::raw(auth()->user()->name." said the following on your post ".$this->post->title.": \n".$this->newComment, function (Message $message) {
                    $message->to($this->userEmail);
                });
            }
            
            $this->newComment = "";

            
        }

        



    }
    

    public function save()
    {
        
    }

    public function delete($cid)
    {
        $comment = Comment::findOrFail($cid);
        $comment->delete();
        $this->refresh();



       
    }

    public function refresh()
    {
        $this->comments = Comment::where('post_id', '=', $this->post->id)->get()->toArray();
        $this->emitSelf("refreshComponent");
    }

    public function getDBComments()
    {
        $this->dbComments = Comment::where('post_id', '=', $this->post->id)->where('user_id', '=', auth()->user()->id)->get();
    
    
    }




    public function render()
    {
        return view('livewire.commenter');
    }
}
