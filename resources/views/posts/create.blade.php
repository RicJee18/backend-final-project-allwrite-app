@extends('/layouts.app')

@section('content')

    <div class="container" style="margin-top: 50px">
        <div class="col-1">
            <a href="/profile/{{ auth()->user()->id }}">
                <button type="button" class="btn btn-floating mx-1 rounded-circle text-white"
                    style="background-color: black">
                    <i class="fa fa-arrow-left"></i>
                </button>
            </a>

        </div>
        <form action="/post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-8 offset-2">

                <div class="row">
                    <h2>Add New Story</h2>

                </div>

                <div class="form-group row">
                    <label>Post Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" autocomplete="title" autofocus>

                    @error('title')

                        <span class="invalid-feedback" role="alert"></span>
                        <strong>{{ $message }}</strong>

                    @enderror

                </div>

                <div class="form-group row">
                    <label>Post Story</label>
                    <textarea type="text" name="story" id="story" cols="30" rows="5"
                        class="form-control @error('story') is-invalid @enderror" value="{{ old('story') }}"
                        autocomplete="story" autofocus></textarea>

                    @error('story')

                        <span class="invalid-feedback" role="alert"></span>
                        <strong>{{ $message }}</strong>

                    @enderror

                </div>

                <div class="row">

                    <label for="image">Post Image</label>
                    <input type="file" name="image" class="form-control-file">

                    @error('image')

                        <strong>{{ $message }}</strong>

                    @enderror
                </div>

                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary">Add New Story</button>
                </div>

            </div>
        </form>

    </div>
@endsection
