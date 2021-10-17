@extends('layout.app')

@section('title', 'Forum')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h1>@yield('title')</h1>
                </div>
                <div class="card-body">
                    <p>Topics</p>
                    <div class="row">
                        @foreach ($topics as $topic)
                        <div class="col-12 col-lg-12">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 card="card-title">
                                        <a href="<?= route('topic', $topic['id']) ?>" class="card-link"><?= $topic['title'] ?></a>
                                    </h5>
                                    <p class="card-text"><?= $topic['description'] ?></p>
                                    <p class="text-muted">By: <strong><?= $topic['creator']['firstName'] ?> <?= $topic['creator']['lastName'] ?></strong> - <?= $topic['created_at'] ?></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @auth
                    <form action="<?= route('add-topic') ?>" method="POST" class="mt-3">
                        @csrf
                        <h5>Add new topic:</h5>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
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
