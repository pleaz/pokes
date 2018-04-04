<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        {{Form::open(['url'=>route('bounty.save'), 'class="needs-validation" novalidate'])}}

        <div class="modal-header">
            <h5 class="modal-title">Adding bounty</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <div class="form-group row">
                {{Form::label('name', 'Name', ['class'=>'col-sm-6 col-form-label'])}}
                <div class="col-sm-6">
                    {{Form::text('name', null, ['class'=>'form-control'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('twitter_url', 'Twitter url', ['class'=>'col-sm-6 col-form-label'])}}
                <div class="col-sm-6">
                    {{Form::text('twitter_url', null, ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('twitter_number', 'on spreadsheet number (Twitter)', ['class'=>'col-sm-6 col-form-label'])}}
                <div class="col-sm-6">
                    {{Form::text('twitter_number', null, ['class'=>'form-control'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('twitter_tags', 'Twitter hashtags (without #)', ['class'=>'col-sm-6 col-form-label'])}}
                <div class="col-sm-6">
                    {{Form::select('twitter_tags[]', [], null, ['class'=>'form-control', 'id'=>'twitter_tags', 'data-role'=>'tagsinput', 'multiple', 'autocomplete'=>'off'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('first_day', 'First day for reports', ['class'=>'col-sm-6 col-form-label'])}}
                <div class="col-sm-6">
                    {{Form::text('first_day', null, ['class'=>'form-control datepicker'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('period', 'Period for reports', ['class'=>'col-sm-6 col-form-label'])}}
                <div class="col-sm-6">
                    {{Form::text('period', null, ['class'=>'form-control'])}}
                </div>
            </div>

        </div>

        <div class="modal-footer">
            {{Form::button('Close', ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal'])}}
            {{Form::submit('Save changes', ['class'=>'btn btn-primary'])}}
        </div>

        {{Form::close()}}

        <script type="application/javascript">
            var engine = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '{{route('bounty.search')}}?tag=%QUERY%',
                    wildcard: '%QUERY%'
                }
            });
            engine.initialize();

            $('select[data-role="tagsinput"]').tagsinput({
                typeahead: {
                    items: 4,
                    source: engine.ttAdapter()
                },
                confirmKeys: ['Enter', ',', '.', ' '],
                tagClass: 'badge badge-info',
                trimValue: true
            });

            $('.datepicker').datepicker({
                format: "dd.mm.yyyy",
                autoclose: true,
                language: "ru"
            });

            $('form').on('submit',function(e){
                e.preventDefault();
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                $('.alert').remove();
                var form = $(this);
                axios.post(form.attr('action'), form.serialize())
                .then(function (response) {
                    console.log(response);
                })
                .catch(function(error){
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