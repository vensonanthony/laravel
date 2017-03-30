@extends('layouts/temp_main')
@section('content')
    <div class="container">
        @if(isset($details))
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
        <h2>Sample User details</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            @if($details->count())
                @foreach($details as $user)
                <tr>
                    <td><a href="#">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        @endif
    </div>

@endsection