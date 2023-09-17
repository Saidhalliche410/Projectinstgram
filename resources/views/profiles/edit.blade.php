@extends('layouts.app')
<script src="{{ mix('js/app.js') }}"></script>
@section('content')
    <div class="container">
        <form action="{{url('profile/'.$var2->id.'/update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">

                <div class=" row " >
                    <div> <h1 style="padding-left: 4.25em"  > Edit Profile</h1></div>

                    <div class="col-8 offset-2" >
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label ">Title</label>


                            <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title"  value="{{ old('title') ?? $var2->profile->title }}"  autocomplete="name" autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label ">Description</label>


                            <input id="name" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $var2->profile->description }}"  autocomplete="name" autofocus>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="url" class="col-md-4 col-form-label ">URL</label>


                            <input id="name" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $var2->profile->url }}"   autocomplete="name" autofocus>

                            @error('url')
                            <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                            @enderror
                        </div>

                        <div class="row">
                            <label for="image" class="col-md-4 col-form-label ">Profile Image</label>
                            <input type="file"  class="form-control " id="image" name="image" value="{{ old('image') ?? $var2->profile->image }}">
                            @error('image')

                            <strong>{{ $message }}</strong>

                            @enderror
                        </div>
                        <div class="row pt-5">
                            <button type="submit" class="btn btn-primary" style="width: 150px"> Save profile</button>
                        </div>


                    </div>

                </div>

            </div>


        </form>

    </div>

@endsection
