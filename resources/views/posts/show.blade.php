@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
    <img src="/storage/{{$var->image}}" class="w-100">
</div>
    <div class="col-4">
        <div>

            <div class="d-flex align-items-center">
                <div class="pe-4">
                    <img src="{{$var->user->profile->image()}}" class="rounded-circle w-100" style="max-width: 40px">
                </div>
                <div>
                    <div style="font-weight: 700">
                        <a style="text-decoration: none" href="{{url('profile/'.$var->user->profile->id)}}">
                            <span class="text-dark" style="font-weight: bold ">{{$var->user->username}}</span>
                        </a>

                        <a href="#" class="ps-3">Fllow</a>
                    </div>
            </div>
            </div>
            <hr>
                <div>
                    <p><a style="text-decoration: none"   href="{{url('profile/'.$var->user->profile->id)}}"><span  class="text-dark"  style="font-weight: bold; ">{{$var->user->username}}</span> </a>{{$var->caption}}</p>
        </div>


</div>
        <script src="{{ mix('js/app.js') }}"></script>
@endsection
