@extends('layouts.app')

@section('content')
<div class="container">
    @include('home.hero')
    <div>
        <div class="text-center">
            <h1 class="font-weight-bolder text-primary">Services we offer</h1>
            <p class="text-muted">We have thousands of providers ready to work for you.</p>
        </div>
        <div class="home-services">
            <ul class="nav nav-tabs font-weight-500 justify-content-center border-0 text-uppercase" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link border-bottom px-5 active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ALL CATEGORIES</a>
                </li>
                @foreach(\App\Lib\Services\Service::SERVICE_CATEGORIES as $index => $service)
                <li class="nav-item" role="presentation">
                    <a class="nav-link border-bottom px-5" id="profile-tab" data-toggle="tab" href="#{{ \Illuminate\Support\Str::slug($service) }}" role="tab" aria-controls="profile" aria-selected="false">{{ $service }}</a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content pt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        @foreach($services as $service)
                            <div class="col-md-4">
                                @include('services.row-service')
                            </div>
                        @endforeach
                    </div>
                </div>
                @foreach(\App\Lib\Services\Service::SERVICE_CATEGORIES as $index => $service)
                <div class="tab-pane fade" id="{{ \Illuminate\Support\Str::slug($service) }}" role="tabpanel" aria-labelledby="{{ \Illuminate\Support\Str::slug($service) }}-tab">
                    @foreach($services as $service)
                        <div class="col-md-4">
                            @include('services.row-service')
                        </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
