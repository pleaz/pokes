<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        {{Form::open(['url'=>route('bounty.save'), 'id'=>'bounty-add'])}}

        <div class="modal-header">
            <h5 class="modal-title">{{__('messages.form-bounty-add.title')}}</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <div class="form-group row">
                {{Form::label('name', __('messages.form-bounty-add.name'), ['class'=>'col-sm-6 col-form-label'])}}
                <div class="col-sm-6">
                    {{Form::text('name', null, ['class'=>'form-control'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('twitter_url', __('messages.form-bounty-add.twitter_url'), ['class'=>'col-sm-6 col-form-label'])}}
                <div class="col-sm-6">
                    {{Form::text('twitter_url', null, ['class' => 'form-control', 'placeholder' => 'https://twitter.com/Bounty'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('twitter_number', __('messages.form-bounty-add.twitter_number'), ['class'=>'col-sm-6 col-form-label'])}}
                <div class="col-sm-6">
                    {{Form::text('twitter_number', null, ['class'=>'form-control'])}}
                </div>
            </div>
            <div class="form-group row">
                <label for="twitter_tags" class="col-sm-6 col-form-label">
                    <div>{{ __('messages.form-bounty-add.twitter_tags') }}</div>
                    <div class="w-25 d-inline">
                        <span class="small">Search by</span>
                        <i class="fab fa-algolia text-primary"></i>
                        <span class="font-weight-bold">algolia</span>
                    </div>
                </label>
                <div class="col-sm-6">
                    {{Form::select('twitter_tags[]', [], null, ['class'=>'form-control', 'id'=>'twitter_tags', 'data-role'=>'tagsinput', 'multiple', 'autocomplete'=>'off'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('first_day', __('messages.form-bounty-add.first_day'), ['class'=>'col-sm-6 col-form-label'])}}
                <div class="col-sm-6">
                    {{Form::text('first_day', null, ['class'=>'form-control datepicker'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('period', __('messages.form-bounty-add.period'), ['class'=>'col-sm-6 col-form-label'])}}
                <div class="col-sm-6">
                    {{Form::text('period', null, ['class'=>'form-control'])}}
                </div>
            </div>

        </div>

        <div class="modal-footer">

            {{Form::button(__('messages.form-bounty-add.close'), ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal'])}}
            {{Form::submit(__('messages.form-bounty-add.save'), ['class'=>'btn btn-primary'])}}
        </div>

        {{Form::close()}}


        <script type="application/javascript">
            var tags = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '{{route('bounty.search')}}?tag=',
                    replace: function(url, query){
                        if(!$('.load-tags').length) {
                            $('.bootstrap-tagsinput').find('input').after('<i class="load-tags fas fa-spinner fa-pulse"></i>');
                        }
                        return url+encodeURIComponent(query);
                    },
                    transform: function(tags) {
                        $('.bootstrap-tagsinput').find('input').next('.load-tags').remove();
                        return $.map(tags, function(tag) {
                            return tag.name;
                        });
                    }
                }
            });
            tags.initialize();
            $('select[data-role="tagsinput"]').tagsinput({
                typeahead: {
                    items: 4,
                    source: tags.ttAdapter()
                },
                confirmKeys: ['Enter', ',', '.', ' '],
                tagClass: 'badge badge-info',
                trimValue: true
            });

            $('.datepicker').datepicker({
                format: "dd.mm.yyyy",
                autoclose: true,
                language: "{{ LaravelLocalization::getCurrentLocale() }}"
            });

            $('#bounty-add').on('submit',function(e){
                e.preventDefault();
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                $('.alert').remove();
                var form = $(this);
                form.find(':input[type=submit]').prop('disabled', true);
                axios.post(form.attr('action'), form.serialize())
                .then(function (response) {
                    if (typeof window.yaCounter48503996 === 'object') {
                        yaCounter48503996.reachGoal('bounsubm');
                    }
                    window.location = response.data.url;
                })
                .catch(function(error){
                    form.find(':input[type=submit]').prop('disabled', false);
                    if(error.response.data.message){
                        $('.modal-body').prepend('<div class="alert alert-warning" role="alert">'+error.response.data.message+'</div>');
                    }
                    $.each(error.response.data.errors, function(key, val){
                        var i = $('#'+key);
                        i.addClass('is-invalid');
                        $.each(val, function(k, v){
                            i.after('<div class="invalid-feedback">'+v+'</div>');
                        });
                    });

                });
            });
        </script>

    </div>
</div>