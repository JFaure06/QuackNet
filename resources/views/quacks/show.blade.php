@extends('layouts.app')

@section('title')

    Detail Quack

@endsection

@section('content')

    <div class="container">
        <!------------------------------------------------------------------------- add a comment ---------------------------------------------------------------------------------------------------->
        @if(Auth::check())
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('comments.store', $quack) }}" method="POST">
                @csrf

                <textarea id="new_comment" name="new_comment" placeholder="comment!!!!" rows="5"
                          style="width: 800px;"></textarea>
                <input type="hidden" id="quack_id" name="quack_id" value="{{ $quack->id }}">
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                <button class="btn btn-info align-content-center" type="submit">add comment</button>
            </form>
            <!------------------------------------------------------------------------- display the quack ------------------------------------------------------------------------------------------------>

            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">{{ $quack->user->duckname }}</h5>
                                        <p style="font-size:10px">{{ $quack->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>{{ $quack->message }}</p>
                                <img src="{{ $quack->picture }}" alt="watch">
                            </div>
                            <div class="card-footer">
                                <h6>Comments</h6>
                                <!------------------------------------------------------------------------- display all comments --------------------------------------------------------------------------------------------->
                                @foreach ($quack->comments as $comment)

                                    <div class="card mt-3">
                                        <div class="card-header">

                                            @if($comment->user->id == Auth::user()->id || $quack->user->id == Auth::user()->id || Gate::allows('delete-quack', $quack))

                                                <form action="{{ route('comments.delete', $quack) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="close"><span class="fa fa-trash"
                                                                                              style="font-size:10px"></span>
                                                    </button>
                                                </form>
                                            @endif
                                            <div>
                                                <a href="{{ route('ducks.profile', $quack->user) }}">{{ $comment->user->duckname }}</a>
                                                <p style="font-size:10px">{{ $comment->created_at }}</p>
                                            </div>

                                        </div>
                                        <div class="card-body">
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
