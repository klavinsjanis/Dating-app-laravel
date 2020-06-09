@extends('layouts.app')
@section('content')
    <head>
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
        <script src="{{ asset('js/scripts.js')}}"></script>
    </head>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <img src="{{$user->getPicture()}}" id="imgProfile"
                             style="width: 300px; height: 300px" class="img-thumbnail"/>
                        <form class="form" method="post" enctype="multipart/form-data"
                              action="{{route('profile.update')}}">
                            @csrf
                            @method('PUT')
                            <div class="tab-pane fade show active" id="basicInfo" role="tabpanel"
                                 aria-labelledby="basicInfo-tab">
                                <div>
                                    <input type="file" class="form-control-file" id="picture" name="picture">
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">First Name</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <input id="first_name" type="text"
                                               class="form-control" minlength="1" maxlength="15"
                                               name="first_name" value="{{ $user->first_name  }}">
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Last Name</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <input id="last_name" type="text"
                                               class="form-control " minlength="1" maxlength="15"
                                               name="last_name" value="{{ $user->last_name }}">
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;"> Age</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <input class="form-control" type="number" name="user_age" min="18" max="65"
                                               value="{{ $user->user_age}}">
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Gender</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <select name="user_gender_id" id="user_gender_id" type="number" class="form-control">
                                            <option value=1 {{ $user->user_gender_id == 1 ? 'selected' : '' }}>
                                                Male
                                            </option>
                                            <option value=2 {{ $user->user_gender_id == 2 ? 'selected' : '' }}>
                                                Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Show Me</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <select name="target_gender_id" id="target_gender_id" type="number" class="form-control"  >
                                            <option value=1 {{ $user->target_gender_id == 1 ? 'selected' : '' }}>
                                                Men
                                            </option>
                                            <option value=2 {{ $user->target_gender_id == 2 ? 'selected' : '' }}>
                                                Women
                                            </option>
                                            <option value=3 {{ $user->target_gender_id == 3 ? 'selected' : '' }}>
                                                Both
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Location</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <input id="location" type="text"
                                               class="form-control" minlength="1" maxlength="50"
                                               name="location" value="{{ $user->location }}">
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">About You</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    <div class="form-group shadow-textarea">
                                        <textarea class="form-control z-depth-1" name="about" id="about" rows="3"
                                                  placeholder="Write something about yourself..">{{ $user->about }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Select age group <br/>
                                        (18 - 65+)</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    Display
                                    <input class="form-control col-lg-1" style="display: inline-block; vertical-align: top;"
                                           size="4" type="number" name="target_min_age" min="18"
                                           max="65"
                                           value="{{ $user->target_min_age }}">
                                    to
                                    <input class=" form-control col-lg-1" style="display: inline-block; vertical-align: top;"
                                           type="number" size="4" name="target_max_age" min="18"
                                           max="65"
                                           value="{{ $user->target_max_age}}">
                                </div>
                            </div>
                            <hr/>
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



