@extends('/layouts.app')

@section('content')
    <div class="container card" style="margin-top: 70px">

        <div class="row mt-5">
            <div class="col-1">
                <a href="/">
                    <button type="button" class="btn btn-floating mx-1 rounded-circle text-white"
                        style="background-color: black">
                        <i class="fa fa-arrow-left"></i>
                    </button>
                </a>

            </div>
            <div class="col-6">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100 h-50">
                <br>
                <br>
                <p>
                    <center>
                        <span class="font-weight-bold">
                            <h5 class="font-weight-bold" style="margin-top:-13px;"><span style="color: black">
                                    {{ $post->title }}</span></h5>
                        </span>
                    </center>
                <p>{{ $post->story }}</p>
                </p>

            </div>

            <div class="col-5 ">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle w-100"
                            style="max-width:40px">
                    </div>
                    <div class="d-flex">
                        <h5 class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}"><span
                                    class="text-dark">{{ $post->user->name }}</span></a>
                        </h5>

                    </div>

                    <div class="d-flex ml-5 px-3 ml-auto">

                        @can('update', $post)
                            <a href="/post/{{ $post->id }}/edit">
                                <button class="btn btn-sm btn-success sm:block ml-2">Update</button>
                            </a>
                        @endcan

                        @can('delete', $post)

                            <a href="/delete/{{ $post->id }}" class="ml-2"
                                style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                                <button class="btn btn-sm btn-danger sm:block">Delete</button>
                            </a>

                        @endcan

                    </div>

                </div>

                <hr>

                <div class="">
                    <h6 class="font-weight-bold">Comments :</h6>
                    <hr />
                </div>

                @foreach ($post->comments as $comment)
                    <div class="d-flex mt-2 p-2" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                        <a href="/post/{{ $post->id }}">
                            <span class="text-dark">{{ $comment->user_name }}</span>
                        </a>
                        :
                        <em class="text-gray" style="color: grey">
                            <span style="color: grey"><span
                                    class="ml-3">{{ $comment->comment }}</span>&nbsp;<span>&#183;</span>
                                {{ $comment->created_at->diffForHumans() }}</span>
                        </em>

                    </div>
                @endforeach

                <div class="">
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb"> --}}
                    <div class="form-group has-search w-100 " style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                        <form action="/post/{{ $post->id }}/comments" method="post">
                            @csrf
                            <div class="input-group ">
                                <input type="hidden" value="{{ $post->user->username }}">
                                <input type="text" class="form-control" name="comment" placeholder="Comment here .."> <span
                                    class="input-group-btn">
                                    <button type="submit" class="btn text-white ml-2"
                                        style="background-color: rgb(171, 52, 235)">
                                        Comment
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    {{-- </ol>
                    </nav> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
