@extends('layout.app')

@section('title', 'Image gallery')

@section('styles')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            justify-items: center;
            align-items: center;
            grid-gap: 2em;
        }

        @media screen and (max-width: 990px) {
            .grid-container {
                grid-template-columns: auto auto;
            }
        }

        @media screen and (max-width: 770px) {
            .grid-container {
                grid-template-columns: auto;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card mt-5 mb-5">
                <div class="card-header d-flex justify-content-between">
                    <h3>@yield('title')</h3>
                    @auth
                    <a href="{{ route('image-create') }}" class="btn btn-success">Upload</a>
                    @endauth
                </div>
                <div class="card-body">
                    <div class="grid-container">
                    @foreach ($images as $image)
                        <div class="card">
                            <img src="{{ URL::to('/') }}/images/{{ $image['image'] }}" class="card-img-top" alt="{{ $image['title'] }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $image['title'] }}</h5>
                                <p class="card-text">Uploaded by: {{ $image['uploader']['firstName'] }} {{ $image['uploader']['lastName'] }}, at: {{ $image['created_at'] }}</p>
                                @auth
                                @if (Auth::user()->id == $image['uploader']['id'])
                                <a href="{{ route('show-image', $image['id']) }}" class="btn btn-primary">Edit image</a>
                                <a href="{{ route('delete-image', $image['id']) }}" class="btn btn-danger">Delete image</a>
                                @endif
                                @endauth
                                
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
