@extends('layout.app')

@section('title', 'Modify comment')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-comment', $comment['id']) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="comment" class="form-label">Write your comment:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3">{{ $comment['comment'] }}</textarea>
                        </div>
                        @if (isset($error))
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
