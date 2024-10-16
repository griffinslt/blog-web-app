<x-app-layout>




    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (App\Models\Picture::where('pictureable_id', '=', auth()->user()->id)->where(
        'pictureable_type',
        '=',
        App\Model\User::class)->first() == null)
        @php
            
            $pp = new App\Models\Picture;
            $pp->pictureable_id = auth()->user()->id;
            $pp->pictureable_type = 'App\Models\User';
            $pp->file_path = url('images/blank-profile-picture.png');
            $pp->save();

            $role_assigned = DB::table('role_user')->get()->contains('user_id', auth()->user()->id)

        @endphp



@if ( !$role_assigned)
    @php
        DB::table('role_user')->insert([
                    'user_id' => auth()->user()->id,
                    'role_id' => App\Models\Role::where('role_name', '=', 'normal')->first()->id,
                ]);
    @endphp

@endif

 
    @endif
    
    <div class="py-12">


        

        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6">
                    <a class="btn btn-primary" href="{{ route('posts.index') }}">To Posts</a>
                </div>
                <div class="p-6">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">To Users</a>
                </div>
                <div class="p-6">
                    <a class="btn btn-primary" href="{{ route('users.user', ['user' => auth()->user()->id]) }}">Your
                        Blog Info</a>




                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
