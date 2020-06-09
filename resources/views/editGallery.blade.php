@extends('layouts.app')

@section('content')
    <head>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$user->first_name}}'s - Gallery</div>
                    <div class="card-body">

                        <form class="form-horizontal"  enctype="multipart/form-data" method="post"
                              action="{{route('profile.gallery.edit')}}">
                            @csrf
                            @method('PUT')
                            <div>
                                <input type="file" class="form-control-file" id="picture" name="picture">
                            </div>

                            <br/>
                            <button type="submit" class="btn btn-primary" id="submit">Upload Picture To Galery</button>
                        </form>

                        <hr>
                        <div style="display: flex; justify-content: space-between;" class="row">

                            @if($pictures ?? '')
                                @foreach($pictures ?? '' ?? '' as $picture)
                                    <figure class="col-md-4">
                                        <a href="{{$picture->path}}" data-size="1600x1067">
                                            <img alt="picture" src="{{$picture->path}}" class="img-fluid"  />
                                        </a>
                                    </figure>
                                @endforeach
                            @else
                                <p>  Gallery Empty <p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
