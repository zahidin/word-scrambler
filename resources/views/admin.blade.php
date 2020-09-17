@extends('layouts.app')

@section('content')
<div id="admin" class="container">
    <div class="row">
        <div class="col-4">
            <div class="bg-primary p-3 rounded text-white">
                <button class="primary btn-create-word font-weight-bold">Create Word</button>
                <div id="notif-success" hidden class="alert alert-success mt-3" role="alert">
                    <h4 class="alert-heading">Correct Answer!</h4>
                    <h5 class="mb-0">The word you got <b class="new-word"></b></h5>
                </div>
            </div>
        </div>
        <div class="col-8">
            <h3 class="font-weight-bold text-white my-3">Record All Player Game</h3>
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
                        <td>{{$d->name}}</td>
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
</div>
@endsection
