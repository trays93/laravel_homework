@extends('layout.app')

@section('title', 'Forum')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h3 class="card-title">{{ $topic['title'] }}</h3>
                    <p class="lead">By: <strong>{{ $topic['creator']['firstName'] }} {{ $topic['creator']['lastName'] }}</p></strong>
                </div>
                <div class="card-body">

                    <p>Comments:</p>

                    <div class="row">
                    @foreach ($topic['comments'] as $comment)
                        <div class="col-12 col-lg-12">
                            <div class="card mt-1 mb-1">
                                <div class="card-body">
                                    <p class="card-text">{{ $comment['comment'] }}</p>
                                    <p class="card-text text-end fw-light">
                                        By: {{ $comment['user']['firstName'] }} {{ $comment['user']['lastName'] }}, at: {{ $comment['created_at']}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                    @auth
                    <form action="{{ route('add-comment', $topic['id']) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="comment" class="form-label">Write your comment:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>
                        @if (isset($error))
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @endauth

                </div>
            </div>
        </div>
    </div>
@endsection
