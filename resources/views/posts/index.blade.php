@extends('/layouts.app')

@section('content')
     
     {{-- THIS IS THE SEARCH SECTION  --}}

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <div class="form-group has-search w-100 ">
                    <form action="/" method="get" role="search">
                        {{ csrf_field() }}
                        <div class="input-group mt-3" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                            <input type="text" class="form-control w-75" name="q" placeholder="Search story"
                                style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;"> <span class="input-group-btn">
                                <button type="submit" class="btn text-white"
                                    style="background-color: rgb(171, 52, 235); box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                                    <span class="fa fa-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </ol>
        </nav>
    </div>
     
    {{-- DIPLAYING / SHOWING EACH POST OF THE USER --}}
    
    <div class="container" style="margin-top: 70px;">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-3 pb-4 pl-4 ">
                    <div class="d-flex mb-2">
                        <a href="/post/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle w-100"
                                style="max-width:40px">
                        </div>
                        <div class="d-flex">
                            <h6 class="font-weight-bold pt-1">
                                <a href="/post/{{ $post->id }}">
                                    <span class="text-dark">{{ $post->title }}</span>
                                </a>
                            </h6>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="/post/{{ $post->id }}">
                            <span style="color: grey">{{ $post->user->name }}</span>
                        </a>
                        <em class="text-gray" style="color: grey">
                            <span style="color: grey">&nbsp;<span>&#183;</span>
                                {{ $post->created_at->diffForHumans() }}</span>
                        </em>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- THIS IS PAGINATION SECTION --}}
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
