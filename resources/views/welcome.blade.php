@extends('layouts.app')

@section('content')
    <head>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <script src="{{ asset('js/scripts.js')}}"></script>
    </head>
    <div class="container">
        <div class="row justify-content-center">
            <body>
            <div class="container">
                <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
                <div class="landing-text">
                    <h1>Want to find the person of your dreams?</h1><br>
                    <h1>You've come to the right place!</h1><br>
                    <br>
                    <h1 class="glow"><a class="get-started-tag" href='/register'>GET STARTED</a></h1>
                </div>
                <div class="support-card" id="card-support">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title font-weight-bold">Support</h6>
                            <p>Experiencing problems? <br>
                                Get fast, free help from our friendly assistants.</p>
                            <button type="button" class="btn btn-primary">Contact Us</button>
                        </div>
                    </div>
                </div>
            </div>
            </body>
        </div>
    </div>
@endsection
