@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('quack.store') }}">
            @csrf

            <div class="row justify-content-center">
                <div class="">

                    <div class="col-6">
                        <label for="message"></label>
                        <textarea required type="text" name="message" id="message"
                                  placeholder="publish something..."></textarea>
                    </div>
                    <div class="col-6">
                        <input type="file" class="form-control-file" id="file_input">
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Quack') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @foreach($quacks as $quack)

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{$quack->user->duckname}}</h5>
                                <button href="{{route('quack.edit')}}" type="button"><span class="fa fa-edit" style="font-size:36px"></span></button>
                                <button href="{{route('quack.delete')}}" type="button" class="fa fa-trash" ></button>
                            </div>
                            <div class="card-body">
                                <p>{{ $quack->message }}</p>
                            </div>
                            <div class="card-footer text-muted">
                                2 days ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    @endforeach

@endsection
