@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="embed-responsive embed-responsive-16by9">
            {!!__('messages.cat')!!}
        </div>

    </div>
@endsection
