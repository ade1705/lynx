@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="services-bg height-200"></div>
        <div class="container">
            <div class="py-4 d-flex justify-content-between">
                <div>
                    <h4 class="m-0 text-danger">{{ $service->formatted_service_price }}</h4>
                    <h1 class="m-0 mb-2 display-4 font-weight-500">{{ $service->service_title }}</h1>
{{--                    <p>--}}
{{--                        <span class="pr-3"><i data-feather="star"></i>  4.6</span>  <a href="" class="px-3 border-left font-weight-500"> 26 Reviews </a>--}}
{{--                    </p>--}}
                    <p class="m-0">by <a href="/service-providers/{{ $service->user->id }}">{{ $service->user->name }}</a></p>
                </div>
                <div class="d-flex align-items-center">
                    <a href="/service-providers/{{ $service->user->id }}" class="btn btn-primary px-4">View Provider</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <service-slider :uploaded_images="'{{ $service->images_string }}'"></service-slider>
                </div>
                <div class="col-md-4">
                    <div class="bg-light p-4 border">
                        <div class="mb-1">
                            <h4 class="font-weight-500">Description</h4>
                            {!! $service->service_description !!}
                            <hr />
                            <h5>Need to make talk to the provider?</h5>
                            <form method="POST" action="/messages">
                                @csrf
                                <div class="form-group py-2">
                                    <textarea name="message_message" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae mattis diam, non placerat risus" class="form-control border-left-0 border-top-0 border-right-0" rows="12"></textarea>
                                </div>
                                <input type="hidden" name="message_receiver_id" value="{{ $service->service_user_id }}">
                                <button class="btn btn-danger btn-block shadow">Make Inquiry</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
