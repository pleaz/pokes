@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('messages.bounty-page.title')}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <button type="button" onclick="send('{{route('bounty.add')}}')" class="btn btn-primary">{{__('messages.bounty-page.add_button')}}</button>
                        <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>

                        @foreach($bounties as $bounty)
                            <div class="card mt-3">
                                <div class="card-header">
                                    {{__('messages.bounty-page.bounty_title')}}{{$bounty->id}}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$bounty->name}}</h5>
                                    <button type="button" onclick="send('{{route('bounty.edit-form')}}', '{{$bounty->id}}')" class="btn btn-success">{{__('messages.bounty-page.edit_button')}}</button>
                                    <button type="button" onclick="send('{{route('bounty.del-form')}}', '{{$bounty->id}}')" class="btn btn-danger">{{__('messages.bounty-page.delete_button')}}</button>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
