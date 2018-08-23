@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{__('messages.dashboard')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        {{__('messages.logged')}}<br />
                        Look video how to use that site!<br />
                        <div class="embed-responsive embed-responsive-16by9">

                        <iframe width="560" height="315" src="https://www.youtube.com/embed/v2UeeO2GW7U?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
