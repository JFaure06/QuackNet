@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Résultat de la recherche</h1>
        @foreach($quacks as $quack)
        <ul>
            <li>
                <p>{{ $quack->duckname }}</p>
                </li>
                <li>
                    <p>{{ $quack->message }}</p>
                </li>
        </ul>
        @endforeach
    </div>

@endsection
