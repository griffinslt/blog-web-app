<div>
    <h3> Comments </h2>

        <div class="container-fluid p-3 border bg-light overflow-auto" style="max-height: 450px;">
            @foreach ($comments as $comment)
                @foreach ($users as $user)
                    @if ($user->id == $comment['user_id'])
                        <a href="{{ route('users.user', ['user' => $user]) }}">{{ $user->name }} </a>
                        <p></p>
                    @endif
                @endforeach

                {{ $comment['body'] }}
                @if ($comment['user_id'] == auth()->user()->id)
                    <p></p>
                    <button wire:click="delete({{ $comment['id'] }})" class="btn btn-danger"> Delete </button>
                    <button wire:click="update({{ $comment['id'] }})" class="btn btn-success"> Update </button>
                @endif
                <hr />
            @endforeach
        </div>



        <form wire:submit.prevent="save">
            <textarea type="text" class="form-control" name="body" rows="4" wire:model="newComment"></textarea>
            <button class="btn btn-outline-primary" wire:click="addComment">Write Comment</button>
            <a href="/posts" class="btn btn-primary ">Go Back</a>
        </form>


</div>
