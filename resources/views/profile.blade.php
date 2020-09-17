@extends('layouts.app')

@section('content')
<div id="profile" class="container">
    <section class="container content">
        <div class="row">
            <div class="col-3">
                <div class="bg-primary p-3 rounded text-white font-weight-bold">
                    <img src="{{ asset('assets/logo-stickerearn.png') }}" alt="word scrambler" class="img-thumbnail mb-3">
                    <h5 class="text-center mb-4 font-weight-bold">Powered By Stickearn</h5>
                    <div class="row">
                        <div class="col-6">
                            <p>NAME : </p>
                        </div>
                        <div class="col-6">
                            <p class="text-right">{{$name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>EMAIL : </p>
                        </div>
                        <div class="col-6">
                            <p class="text-right">{{$email}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>SCORE : </p>
                        </div>
                        <div class="col-6">
                            <p class="text-right">{{$user_score}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7 ml-4">
                <h3 class="font-weight-bold text-white">Your Record</h3>
                <table class="table bg-white">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Word</th>
                        <th scope="col">Answer</th>
                        <th scope="col">Correct</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($records) > 0)
                        @php 
                            $i = 1
                        @endphp
                        @foreach ($records as $key => $d)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$name}}</td>
                            <td>{{$d->word}}</td>
                            <td>{{$d->answer}}</td>
                            @if ($d->correct == 1)
                            <td class="text-success">Correct</td>
                            @else
                            <td class="text-danger">Incorrect</td>
                            @endif
                        </tr>
                        @php 
                            $i++
                        @endphp
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center">Not Found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>    
</div>
@endsection
