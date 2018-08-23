@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="accordion" id="accordion">

            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">{{__('messages.faq_page.faq11')}}</button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <img src="/img/1.png" class="img-fluid"><br /><br />
                        <p>{{__('messages.faq_page.faq12')}}</p>
                        <p>{{__('messages.faq_page.faq13')}}</p><br /><br />
                        <p>{{__('messages.faq_page.faq14')}}</p>
                        <img src="/img/9.png" class="img-fluid">

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">{{__('messages.faq_page.faq1')}}</button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <img src="/img/1.jpg" class="img-fluid"><br /><br />
                        <p>{{__('messages.faq_page.faq2')}}</p>
                        <img src="/img/2.png" class="img-fluid"><br /><br />
                        <p>{{__('messages.faq_page.faq3')}}</p>
                        <img src="/img/3.png" class="img-fluid"><br /><br />
                        <p>{{__('messages.faq_page.faq4')}}</p>
                        <p>{{__('messages.faq_page.faq5')}}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">{{__('messages.faq_page.faq6')}}</button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <img src="/img/4.png" class="img-fluid"><br /><br />
                        <p>{{__('messages.faq_page.faq7')}}</p>
                        <img src="/img/5.png" class="img-fluid"><br /><br />
                        <p>{{__('messages.faq_page.faq8')}}</p>
                        <img src="/img/6.png" class="img-fluid"><br /><br />
                        <p>{{__('messages.faq_page.faq9')}}</p>
                        <img src="/img/7.png" class="img-fluid"><br /><br />
                        <p>{{__('messages.faq_page.faq10')}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection