@extends('layouts.app')

@section('content')
<div class="container">
    @include('home.hero')
    <div class="pt-5">
        <div class="pb-2">
            <h1 class="text-primary display-4 font-weight-500 mb-0">Services we offer</h1>
            <p class="text-muted">We have thousands of providers ready to work for you.</p>
        </div>
{{--        <div class="home-services">--}}
{{--        </div>--}}
        <div class="home-services">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4">
                        @include('services.row-service')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
