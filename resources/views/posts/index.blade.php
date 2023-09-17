@extends('layouts.app')

@section('content')
    @foreach($posts as $var)
    <div class="container">

            <div class="row">
                <div class="col-8 offset-3">
                    <a href="/profile/{{$var->user->id}}">  <img src="/storage/{{$var->image}}" class="w-100"></a>
                </div>
            </div>

        <div class="row pt-2 pb-4">
                        <div class="col-6 offset-3 ">


                        <div>
                            <p><a style="text-decoration: none"   href="{{url('profile/'.$var->user->id)}}"><span  class="text-dark"  style="font-weight: bold; ">{{$var->user->username}}</span> </a> <span> {{$var->caption}}</span> </p>
                        </div>
                        </div>
                        </div>
        @endforeach
                        <div class="row" >
                            <div class="col-12 d-flex justify-content-center">
                                {{$posts->links() }}

                            </div>

                        </div>




                    <script src="{{ mix('js/app.js') }}"></script>
@endsection
