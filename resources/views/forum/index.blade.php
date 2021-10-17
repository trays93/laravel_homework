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
                </div>
            </div>
        </div>
    </div>
@endsection
