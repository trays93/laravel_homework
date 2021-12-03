@extends('layout.app')

@section('title', 'Mailbox')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h1 class="card-title">@yield('title')</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>From</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message['title'] }}</td>
                                    <td>{{ $message['body'] }}</td>
                                    <td>{{ $message['sender']['firstName'] }} {{ $message['sender']['lastName'] }}</td>
                                    <td>{{ $message['created_at'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>    
@endsection
