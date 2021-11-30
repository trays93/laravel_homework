@extends('layout.app')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h1>Home Page</h1>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        {{ __('You are logged in!') }}
                    @endif


                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, saepe? Soluta aut minus dignissimos ex, ad vero, consequuntur harum ratione odio quaerat neque eius aperiam at, nihil et suscipit voluptatibus?</p>
                </div>
            </div>
        </div>
    </div>
@endsection
