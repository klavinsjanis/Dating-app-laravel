
@extends('layouts.app')

@section('content')
    <head>
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    </head>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(count($users) > 0)
                    <div class="card-header">Your Matches</div>
                    <div class="card-body">
                        @foreach ($users as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Name: {{$user->first_name}} <br>
                                Location: {{$user->location}} <br>
                                Age: {{$user->user_age}} <br>
                                @If ( $user->user_gender_id === 1)
                                    Gender: Male
                                @else ( $user->user_gender_id === 2)
                                    Gender: Female
                                @endif
                                <div class="image-parent">
                                    <img src="{{ $user->getPicture() }}" style="width: 150px; height: 150px" class="img-fluid"
                                         alt="{{ $user->first_name}}">
                                </div>
                            </li>
                            <br>
                        @endforeach
                        @else
                            <br>
                                <p style="text-align: center;">Currently no matches.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
