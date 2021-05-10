@extends('layouts.app')

@section('content')
    <header class="mb-6 relative">
        <img src="/images/deafult-profile-banner.jpeg" alt="" class="mb-2" style="border-radius: 20px; border: 1px;">
        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px;">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can ('edit', $user)

                    <a href="{{ $user->path('edit') }}" class="rounded-full border border-gray-300 py-2 px-2 text-black text-xs mr-2">Edit Profile</a>
                    
                @endcan
               <x-follow-button :user='$user'></x-follow-button> 
            </div>                                                                                  
        </div>                                                                                  

         <p class="text-sm">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            Quidem, nemo, quis neque ipsa veniam repellat saepe eum 
            itaque ex quae soluta nesciunt enim recusandae, veritatis ab nam 
            et assumenda sunt?Iusto consequuntur veniam quo sint esse quibusdam 
            molestias, praesentium eius. Commodi minima ducimus repellat quos officiis
            voluptatem quisquam, ut quaerat.
        </p>
        <img src="{{ $user->avatar }}" alt="" class="rounded-full mr-2 absolute" 
        style="width: 150px; left: calc(50% - 75px); top: 138px;">
       
    </header>
@include('_timeline', [
    'tweets' => $tweets
])
@endsection
