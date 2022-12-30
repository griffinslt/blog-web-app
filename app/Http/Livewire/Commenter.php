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

    public $newComment;

    public $userEmail;

    public $update = false;

    public $cid;

    public $oldComment;

    public function addComment()
    {
        if ($this->newComment) {
            if ($this->update) {
                $comment = Comment::findOrFail($this->cid);
                $comment->body = $this->newComment;
                $comment->save();
                $this->update = false;
                $this->emailUpdate();

            } else {
                $c = [
                    'body' => $this->newComment,
                    'post_id' => $this->post->id,
                    'user_id' => auth()->user()->id,
                ];

                Comment::create($c);

                $this->emailNew();

                
            }
            $this->refresh();
            $this->newComment = '';
        }
    }


    private function emailNew()
    {
        foreach ($this->users as $postUser) {
            if ($postUser->id == $this->post['user_id']) {
                $this->userEmail = $postUser->email;
                break;
            }
        }
        if (auth()->user()->email != $this->userEmail) {
            Mail::raw(auth()->user()->name . " said the following on your post '" . $this->post->title . "': \n'" . $this->newComment."'", function (Message $message) {
                $message->to($this->userEmail);
            });
        }
    }


    private function emailUpdate()
    {

        $this->userEmail = User::where('id', '=', $this->post['user_id'])->first()->email;
        if (auth()->user()->email != $this->userEmail) {
            Mail::raw(auth()->user()->name . " updated their comment from  '".$this->oldComment."' to '".$this->newComment."' on your post '". $this->post->title."'" , function (Message $message) {
                $message->to($this->userEmail);
            });
        }
    }

    private function emailDelete()
    {
        $this->userEmail = User::where('id', '=', $this->post['user_id'])->first()->email;
        if (auth()->user()->email != $this->userEmail) {
            Mail::raw(auth()->user()->name . " deleted their comment '".$this->oldComment."' on your post '". $this->post->title."'" , function (Message $message) {
                $message->to($this->userEmail);
            });
        }
    }

    public function save()
    {
    }

    public function delete($cid)
    {
        $comment = Comment::findOrFail($cid);
        $this->oldComment = $comment->body;
        $comment->delete();
        $this->emailDelete();
        $this->refresh();
    }

    public function update($cid)
    {
        $this->cid = $cid;
        $comment = Comment::findOrFail($cid);
        $this->oldComment =$comment->body;
        $this->newComment = $this->oldComment;
        $this->update = true;
    }

    public function refresh()
    {
        $this->comments = Comment::where('post_id', '=', $this->post->id)
            ->get()
            ->toArray();
        $this->emitSelf('refreshComponent');
    }

    public function render()
    {
        return view('livewire.commenter');
    }
}
