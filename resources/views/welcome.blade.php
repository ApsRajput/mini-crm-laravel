
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>MINI-CRM 😃</strong></div>

                <div class="card-body">
                    <div class="jumbotron">
                        <h1 class="display-4">{{ __('messages.Hello')}}</h1>
                        <p class="lead">{{ __('messages.Desc')}}. </p>
                        <hr class="my-4">
                        <p>{{ __('messages.Cheers')}} :)</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
