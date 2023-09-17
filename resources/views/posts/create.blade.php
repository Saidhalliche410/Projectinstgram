@extends('layouts.app')

@section('content')
    <style>

    </style>
  <form action="/p" method="post" enctype="multipart/form-data">
      @csrf
      <div class="container">

          <div class="row">

              <div class="col-8 offset-2" >
                  <div class="row mb-3">
                      <label for="caption" class="col-md-4 col-form-label ">Post Caption</label>


                      <input id="name" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="name" autofocus>

                      @error('caption')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                  <div class="row">
                      <label for="image" class="col-md-4 col-form-label ">Post Image</label>
                      <input type="file"  class="form-control " id="image" name="image">
                      @error('image')

                          <strong>{{ $message }}</strong>

                      @enderror
                  </div>
                  <div class="row pt-5">
                      <button class="btn btn-primary" style="width: 150px" > Add new Post</button>
                  </div>


              </div>

          </div>

      </div>


  </form>
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
