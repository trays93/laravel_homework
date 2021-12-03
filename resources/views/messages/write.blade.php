@extends('layout.app')

@section('title', 'Write a message')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <div class="card-body">
                    @if (isset($success))
                    <div class="alert alert-success" role="alert">
                        {{ $success }}
                    </div>
                    @endif
                    <form action="{{ route('send-message') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="to" class="form-label @error('to') is-invalid @enderror">To:</label>
                            <select name="to" id="to" class="form-control">
                                <option value="">Please select</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user['id'] }}" {{ old('to') == $user['id'] ? 'selected' : '' }}>{{ $user['firstName'] }} {{ $user['lastName'] }}</option>
                                @endforeach
                            </select>
                            @error('to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label @error('title') is-invalid @enderror">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label @error('body') is-invalid @enderror">Message:</label>
                            <textarea class="form-control" id="body" name="body" rows="3">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
