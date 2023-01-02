<x-app-layout>



 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    @if (!auth()->user()->profilePicture)
    @php
        $pp = [
                'user_id' => auth()->user()->id,
                'file_path' => url('images/blank-profile-picture.png'),
            ];
            App\Models\ProfilePicture::create($pp);
            header('Refresh:0');
    @endphp
                
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6" >
                    <a class="btn btn-primary" href="{{route('posts.index')}}">To Posts</a>
                </div>
                <div class="p-6">
                    <a class="btn btn-primary" href="{{route('users.index')}}">To Users</a>
                </div>
                <div class="p-6">
                    <a class="btn btn-primary" href="{{route('users.user', ['user' => auth()->user()->id])}}">Your Blog Info</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
