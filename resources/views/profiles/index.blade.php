@extends('layouts.app')
<head>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

@section('content')

<div class="container">
   <div class="row">
       <div class="col-3 " >
           <img src="{{$user->profile->image()}}" class="rounded-circle w-100">
       </div>

       <div class="col-9 pt-5 ">
           <div class="d-flex justify-content-between align-items-baseline">
               <div class="d-flex align-items-center pb-3">
               <div class="h4">{{$user->username}}</div>

                        <div id="app">
                                <example-component user-id="{{$user->id}}" follows="{{$follows}}" ></example-component>
                            </div>


               </div>
               @can('update', $user->profile)
                   <a  href="{{url('p/create')}}" defer> Add new Post</a>
               @endcan

           </div>
           @can('update', $user->profile)
           <a href="{{url('profile/'.$user->id.'/edit')}}"> Edit profile</a>
           @endcan
           <div class="d-flex">
               <div style="padding-right: 1.25rem;"><strong>{{$numberpost}}</strong> posts</div>
               <div style="padding-right: 1.25rem;"><strong>{{$numberfollowers}}</strong> follwers</div>
               <div style="padding-right: 1.25rem;"><strong>{{$numberfollowing}}</strong> following</div>
           </div>
           <div class="pt-4 " style="font-weight: bold;" >{{$user->profile->title}}</div>
           <div>{{$user->profile->description}}</div>
           <div><a target="_blank" href="{{$user->profile->url}}"> {{$user->profile->url}}</a> </div>
       </div>

   </div>
    <div class="row pt-5">
        @foreach($user->post as $i)
        <div class="col-4">
          <a href="/p/{{ $i->id}}">
              <img style="height: 293px; width: 293px;" src="/storage/{{$i->image}}" class="w-80 pb-4">
          </a>
        </div>
        @endforeach

    </div>

</div>
<script src="{{ mix('js/app.js') }}"></script>
@endsection

