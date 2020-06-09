@extends('layouts.app')

@section('content')
    <head>
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    </head>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Your Profile</div>
                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="{{$user->getPicture()}}" id="imgProfile"
                                         style="width: 300px; height: 300px" class="img-thumbnail"/>
                                    <div class="middle">
                                        <br>
                                        <button type="button" class="btn btn-primary"
                                                onclick="window.location='{{ url("profile/edit") }}'">Edit Profile
                                        </button>
                                        <button type="button" class="btn btn-primary" style="background: lightslategrey"
                                                onclick="window.location='{{ url("profile/gallery") }}'">Edit Gallery
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">

                                    <div class="tab-content ml-1" id="myTabContent">
                                        <div class="tab-pane fade show active" id="basicInfo" role="tabpanel"
                                             aria-labelledby="basicInfo-tab">

                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">First Name</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{ $user->first_name }}
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Last Name</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{ $user->last_name }}
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Age</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{$user->user_age}}
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Gender</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    @If ( $user->user_gender_id === 1)
                                                        Male
                                                    @else ( $user->user_gender_id === 2)
                                                        Female
                                                    @endif
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Show me</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    @If ( $user->target_gender_id === 1)
                                                        Men
                                                    @elseif ( $user->target_gender_id === 2)
                                                        Women
                                                    @else
                                                        Men & Women
                                                    @endif
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Location</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{$user->location}}
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">About You</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{$user->about}}
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Age range</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    @if($user->target_max_age > 64)
                                                        {{$user->target_min_age}} to 65+
                                                        @else
                                                    {{$user->target_min_age}} to {{$user->target_max_age}}
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


