@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bounty</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <button type="button" onclick="send('{{route('bounty.add')}}')" class="btn btn-primary">Add new bounty</button>
                        <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="application/javascript">
        function send(url) {
            axios.get(url)
            .then(function (response) {
                $('.modal').empty().append(response.data.html).modal();
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    </script>

@endsection
