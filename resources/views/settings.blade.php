@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        {{Form::open(['url'=>route('settings.save')])}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    @if($user->twitter)
                                        @if($user->twitter->oauth_token)
                                            @if($twitter)
                                                <i class="fas fa-user"></i> {{ $twitter->name }}
                                            @endif
                                            <a href="{{ route('twitter.logout') }}" class="btn btn-primary">
                                                <i class="fas fa-sign-out-alt"></i> Log out
                                            </a>
                                        @else
                                            <a href="{{ route('twitter.login') }}" class="btn btn-primary">
                                                <i class="fab fa-twitter"></i> Sign in with Twitter
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ route('twitter.login') }}" class="btn btn-primary">
                                            <i class="fab fa-twitter"></i> Sign in with Twitter
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('template-twitter', 'Twitter template', ['class'=>'col-sm-2 col-form-label'])}}
                                <div class="col-sm-10">
                                    {{Form::textarea('template-twitter', ($user->settings) ? $user->settings->twitter_template : null, ['class'=>'form-control', 'rows'=>'3'])}}
                                </div>
                            </div>

                            {{Form::submit('Save', ['class'=>'btn btn-primary'])}}

                        {{Form::close()}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
