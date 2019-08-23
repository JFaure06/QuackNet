@extends ('layouts.app')

@section('title')

    My profile page

@endsection


@section('content')

    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="container-fluid text-center">
                    <div class="col"><h1>{{ $user->duckname }}</h1></div>
                    <div class="row mb-2">
                        <div class="col">{{ $user->lastname }}, {{ $user->firstname }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        @foreach($user->quacks as $quack)
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8">
                                        <a href="{{ route('ducks.show', $quack->user_id) }}">
                                            <strong>{{ $quack->user->duckname }}</strong>
                                        </a>
                                        @if ($quack->created_at != $quack->updated_at)
                                            <div class="col">modified : {{ $quack->updated_at }}</div>
                                        @else
                                            <div class="col"></div>
                                        @endif
                                        <div class="col">posted : {{ $quack->created_at }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <img src="{{ $quack->picture }}" alt="watch" class="w-25">
                                <p>{{ $quack->message }}</p>
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
    </div>
@endsection

