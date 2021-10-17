@extends('layout.app')

@section('title', 'Forum')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h3 class="card-title"><?= $topic['title'] ?></h3>
                    <p class="lead">By: <strong><?= $topic['creator']['firstName'] ?> <?= $topic['creator']['lastName'] ?></p></strong>
                </div>
                <div class="card-body">
                    
                    <p>Comments:</p>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
