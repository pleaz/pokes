<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        {{Form::open(['url'=>route('bounty.delete'), 'id'=>'bounty_delete'])}}
        {{Form::hidden('bounty_id', $bounty)}}

        <div class="modal-header">
            <h5 class="modal-title">{{__('messages.form-bounty-delete.title')}}</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body"></div>

        <div class="modal-footer">
            {{Form::button(__('messages.form-bounty-delete.cancel'), ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal'])}}
            {{Form::submit(__('messages.form-bounty-delete.delete'), ['class'=>'btn btn-primary'])}}
        </div>

        {{Form::close()}}

        <script type="application/javascript">
            $('#bounty_delete').on('submit',function(e){
                e.preventDefault();
                $('.alert').remove();
                var form = $(this);
                form.find(':input[type=submit]').prop('disabled', true);
                axios.post(form.attr('action'), form.serialize())
                    .then(function (response) {
                        window.location = response.data.url;
                    })
                    .catch(function(error){
                        form.find(':input[type=submit]').prop('disabled', false);
                        if(error.response.data.message){
                            $('.modal-body').prepend('<div class="alert alert-warning" role="alert">'+error.response.data.message+'</div>');
                        }
                    });
            });
        </script>

    </div>
</div>