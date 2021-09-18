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
        <div class="col-6 offset-3" style="margin-top:-40px;">

            <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">

               @csrf

               @method('PATCH')

                <div class="row">
                    <h1>Edit Profile</h1>
                </div>

                <div class="form-group row">
                    <label for="title">Nickname</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

                    @error('title')

                        <span class="invalid-feedback" role="alert"></span>
                        <strong>{{ $message }}</strong>

                    @enderror

                </div>

                <div class="form-group row">
                    <label for="description">Bio</label>
                    <textarea name="description" id="description" cols="30" rows="5"
                        class="form-control @error('description') is-invalid @enderror" autocomplete="description"
                        autofocus>{{ old('title') ?? $user->profile->description }}
                                    </textarea>

                    @error('description')

                        <span class="invalid-feedback" role="alert"></span>
                        <strong>{{ $message }}</strong>

                    @enderror

                </div>

                <div class="form-group row">
                    <label for="url">URL/Social Medias </label>
                    <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror"
                        value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>

                    @error('url')

                        <span class="invalid-feedback" role="alert"></span>
                        <strong>{{ $message }}</strong>

                    @enderror

                </div>

                <div class="row" >

                    <label for="image">Profile Image</label>
                    <input type="file" name="image" class="form-control-file" >

                    @error('image')

                        <strong>{{ $message }}</strong>

                    @enderror
                </div>

                <div class="row pt-4">
                    <button type="submit" class="btn text-white" style="background-color: rgb(171, 52, 235)">Update
                        Profile</button>
                </div>
            </form>
        </div>

    </div>
@endsection
