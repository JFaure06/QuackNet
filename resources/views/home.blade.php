@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h6>New Quack</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('quacks.store') }}">
                                @csrf
                                <div class="col">
                                    <label for="message"></label>
                                    <textarea required type="text" name="message" id="message"
                                              placeholder="publish something..."
                                              class="form-control form-control-lg"></textarea>

                                    <label for="file_input"></label>
                                    <input type="file" class="form-control-file" name="picture" id="file_input">
                                    <label for="tags"></label>
                                    <input class="form-control" type="text" name="tags" id="tags"
                                           placeholder="add tags">
                                    <div class="mt-1">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Quack') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($quacks as $quack)

            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="card-title">{{ $quack->user->duckname }}</h5>
                                            <p style="font-size:10px">{{ $quack->created_at }}</p>
                                        </div>
                                        <div class="col-md-2 justify-content-end">
                                            <a href="{{ route('quacks.edit', $quack) }}"><span class="fa fa-edit"
                                                                                               style="font-size:15px"></span></a>
                                        </div>
                                        <div class="col-md-2">
                                            <form action="{{ route('quacks.delete', $quack) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><span class="fa fa-trash"
                                                                            style="font-size:10px"></span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>{{ $quack->message }}</p>
                                    <img src="{{ $quack->picture }}" alt="watch">
                                    <div>{{ $quack->tags }}</div>

                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('quacks.show', $quack) }}"><span
                                            class="far fa-comment-alt"></span>
                                        comments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    @endforeach

@endsection
