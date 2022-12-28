<div>
    <h3> Comments </h2>
        <div class= "p-3 border bg-light">

            @foreach ($oldComments as $oldComment)
            
                @foreach ($users as $user) 


                    @if ($user->id == $oldComment['user_id']   )
                        <a href="{{ route('users.user', ['user' => $user]) }}">{{ $user->name }} </a>
                        <p></p>
            
                    @endif
                @endforeach
                
                {{$oldComment['body']}}
                @if ($oldComment['user_id'] == auth()->user()->id)
                    {{-- <p></p> --}}
                    {{-- <button wire:click="delete" class = "btn btn-danger"> Delete </button> --}}
                @endif
                <hr/>
            @endforeach


            @foreach ($comments as $comment)

                @foreach ($users as $user) 
                    @if ($user->id == $comment['user_id']   )
                        <a href="{{ route('users.user', ['user' => $user]) }}">{{ $user->name }} </a>
                        <p></p>
                    @endif
                @endforeach



                {{$comment['body']}}
                @if ($comment['user_id'] == auth()->user()->id)
                    {{-- <p></p> --}}
                    {{--<button wire:click="delete" class = "btn btn-danger"> Delete </button> --}}
                @endif
                <hr/>
            @endforeach
        </div>


    <form wire:submit.prevent="save">
        <textarea type = "text" class="form-control" name= "body" rows="4" wire:model="newComment"></textarea>
     
        <button class= "btn btn-outline-primary" wire:click="addComment">Write Comment</button>
        <a href="/posts" class="btn btn-primary ">Go Back</a>
    </form>

    @foreach ($comments as $comment)
         
    @endforeach
</div>
