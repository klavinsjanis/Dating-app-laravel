@extends('layouts.app')

@section('content')
    <head>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($user)
                    <div class="card-header">{{$user->first_name}}  ({{$user->user_age}}) from {{$user->location}}</div>
                    <div class="card-body" >
                        <img src="{{ $user->getPicture() }}" class="img-fluid"
                             alt="{{ $user->first_name}}">
                        <hr/>
                        About Me: <br>
                        {{$user->about}}
                        <hr/>
                        <div style="display: flex; justify-content: space-between;" class="row">
                            <form method="post" action="{{route('match.dislike', $user)}}" >
                                @csrf
                                <button style="background: slategrey; margin-left:25px" class="btn btn-primary" type="submit">DISLIKE</button>
                            </form>
                            <button  style="background: salmon" type="button" class="btn btn-primary"
                                     onclick="window.location='{{route('gallery', $user)}}'">GALLERY
                            </button>
                            <form method="post" action="{{route('match.like', $user)}}" >
                                @csrf
                                <button style="background: seagreen; margin-right:25px"  class="btn btn-primary" type="submit">LIKE</button>
                            </form>
                      </div>
                        @else
                            <br>
                            <p style="text-align: center;">Out of users to match with.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

