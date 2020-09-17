@extends('layouts.app')

@section('content')
<div id="gameplay" class="container">
    <div id="notif-wrong" hidden class="alert alert-danger mt-3" role="alert">
        <h4 class="alert-heading">Wrong Answer!</h4>
        <p class="mb-0">Keep up the spirit and the correct is <b id="notif-answer"></b></p>
    </div>
    <div id="notif-success" hidden class="alert alert-success mt-3" role="alert">
        <h4 class="alert-heading">Correct Answer!</h4>
        <p class="mb-0">Yeaye you got 10 points</p>
    </div>
    <input class="secret" value="{{$secret}}" hidden/>
    <section class="card-play text-white font-weight-bold d-flex align-items-center justify-content-center p-3">
       {{ $words }}
    </section>
    
    <section class="caption font-weight-bold mt-5">Guess This Word </section>
    <section class="answer container">
        <div class="row">
            @foreach ($answer as $key => $d)
            <div class="col-6 d-flex my-5 justify-content-center align-items-center">
                <button  class="primary btn-answer" data-value="{{$d}}">{{$d}}</button>
            </div>
            @endforeach
        </div>
       
    </section>
</div>
@endsection
