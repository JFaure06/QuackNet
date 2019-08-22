@extends('layouts.app')

@section('title')

    My account

@endsection


@section('content')


    <div class="card" style="width: 18rem;">

        <h5 class="card-title">My Account</h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <img src="..." class="card-img-top" alt="...">
            </li>
            <li class="list-group-item">Firstname : {{ Auth::user()->firstname }}</li>
            <li class="list-group-item">Lastname : {{ Auth::user()->lastname }}</li>
            <li class="list-group-item">Duckname : {{ Auth::user()->duckname }}</li>
            <li class="list-group-item">Email : {{ Auth::user()->email }}</li>
        </ul>
        <a href="{{route('ducks.edit')}}" class="btn btn-primary">modify</a>
    </div>


@stop
