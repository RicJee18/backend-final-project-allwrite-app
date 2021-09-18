@extends('layouts.app')

@section('content')

    <div class="container card" style="margin-top:50px;">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" alt="hello" class="w-100 rounded-circle">
            </div>
            <div class="col-9 p-5">

                <div class="d-flex justify-content-between align-items-baseline">

                    <div class="d-flex align-items-center pb-4">

                        <h2>{{ $user->name }} </h2>

                        {{-- FOLLOW THE USER BUTTON --}}
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>

                    </div>


                    @can('update', $user->profile)
                        <a href="/post/create" class="plus btn">
                            <span>
                                <li class="fa fa-plus"></li>
                            </span>
                        </a>
                    @endcan

                </div>

                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan

                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> Story</div>
                    <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong> Followers</div>
                    <div class="pr-5"><strong>{{ $user->following->count() }}</strong> Following</div>
                </div>

                <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="#">{{ $user->profile->url }}</a></div>

            </div>

        </div>
        <hr style="margin-top:-20px;">


        <div class="row m-1">
            @foreach ($user->posts as $post)


                <div class="col-3 pb-4">
                    <a href="/post/{{ $post->id }}">
                        <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                    </a>
                    <div class="d-flex mt-1">
                        <a href="/post/{{ $post->id }}">
                            <span style="color: black" class="font-weight-bold">{{ $post->title }}</span>
                        </a>
                        <em class="text-gray" style="color: grey">
                            <span style="color: grey">&nbsp;<span>&#183;</span>
                                {{ $post->created_at->diffForHumans() }}</span>
                        </em>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
