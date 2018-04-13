@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.report.title')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{Form::open(['class'=>'form-inline mb-3'])}}
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="date" class="col-sm-2 col-form-label"><i class="far fa-calendar-alt"></i></label>
                            {{Form::text('date', \Carbon\Carbon::now()->format('d.m.Y'), ['id'=>'date', 'class'=>'form-control datepicker'])}}
                        </div>
                        {{Form::submit(__('messages.report.show_button'), ['class'=>'btn btn-primary mb-2'])}}
                    {{Form::close()}}

                    @if ($bounties->isEmpty() or $errors->any())
                        <div class="alert alert-success">{{__('messages.report.not_found')}}</div>
                    @else
                        @foreach($bounties as $bounty)
                            @php
                                $search = $bounty->reports()->where('date', $current_date)->first()
                            @endphp
                            <div class="card mt-3">
                                <div class="card-header">
                                    {{__('messages.report.bounty_title')}}{{$bounty->id}}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$bounty->name}}</h5>
                                    @if($search)
                                        {{Form::open(['url'=>route('reports.search'), 'class'=>'report_generate form-inline mb-3'])}}
                                    @else
                                        {{Form::open(['url'=>route('reports.generate'), 'class'=>'report_generate form-inline mb-3'])}}
                                    @endif
                                    {{Form::hidden('dates', $current_date)}}
                                    {{Form::hidden('bounty', $bounty->id)}}
                                    @if($search)
                                        {{Form::submit(__('messages.report.show_hide_button'), ['class'=>'btn btn-success'])}}
                                    @else
                                        {{Form::submit(__('messages.report.generate_button'), ['class'=>'btn btn-success'])}}
                                    @endif
                                    {{Form::close()}}
                                </div>
                            </div>
                        @endforeach
                    @endif

                        <script type="application/javascript">
                            $('.datepicker').datepicker({
                                format: "dd.mm.yyyy",
                                autoclose: true,
                                language: "{{ LaravelLocalization::getCurrentLocale() }}"
                            });

                            $('.report_generate').on('submit',function(e){
                                e.preventDefault();
                                var form = $(this);
                                form.find(':input[type=submit]').prop('disabled', true);
                                var before = axios.interceptors.request.use(function (config) {
                                    form.after('<i class="load-bounty fas fa-spinner fa-pulse"></i>');
                                    return config;
                                }, function() {
                                    form.next('.load-bounty').remove();
                                });
                                var later = axios.interceptors.response.use(function (response) {
                                    form.next('.load-bounty').remove();
                                    return response;
                                }, function(error) {
                                    form.find(':input[type=submit]').prop('disabled', false);
                                    form.next('.load-bounty').remove();
                                    if(error.response.data.message){
                                        alert(error.response.data.message);
                                    }
                                });
                                axios.post(form.attr('action'), form.serialize())
                                    .then(function (response) {
                                        form.find(':input[type=submit]').prop('disabled', false);
                                        if(response.data.status === 'ok'){
                                            form.find(':input[type=submit]').attr('value','{{__('messages.report.show_hide_button')}}');
                                            form.attr('action', '{{route('reports.search')}}');
                                        } else if(response.data.status === 'report'){
                                            form.find(':input[type=submit]').attr('value','{{__('messages.report.show_hide_button')}}');
                                            if(form.next('textarea').length > 0) {
                                                form.next('textarea').remove();
                                            } else {
                                                form.after('<textarea class="form-control" rows="8">' + response.data.data + '</textarea>');
                                            }
                                        }
                                        axios.interceptors.request.eject(before);
                                        axios.interceptors.request.eject(later);
                                    })
                                    .catch(function(){
                                        axios.interceptors.request.eject(before);
                                        axios.interceptors.request.eject(later);
                                    });
                            });
                        </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
