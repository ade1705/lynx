@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="services-bg height-200"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class=" shadow p-2 margin-top-minus-20 position-relative bg-white margin-minus-top-50">
                        <img class="img-fluid rounded-sm" src="{{ $profile->profile_full_avatar }}" />
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="d-flex justify-content-between pt-4">
                        <div class="mr-3">
                            <h1 class="m-0 mb-0 font-weight-bold">{{ $profile->profile_username }}</h1>
                            <div class="mb-2 h2">
                                <a target="_blank" href="{{ $profile->profile_website }}"><i data-feather="globe" class="h4"></i></a>
                                <a target="_blank" href="https://www.instagram.com/{{ $profile->profile_facebook }}"><i data-feather="facebook" class="h4"></i></a>
                                <a target="_blank" href="https://www.twitter.com/{{ $profile->profile_twitter }}"><i data-feather="twitter" class="h4"></i></a>
                                <a target="_blank" href="https://www.instagram.com/{{ $profile->profile_instagram }}"><i data-feather="instagram" class="h4"></i></a>
                            </div>
                            <div class="d-flex">
                                <div class="mr-5">
                                    <p class="text-muted small m-0 mb-1">RESPONSE TIME</p>
                                    <h5 class="text-secondary font-weight-bold">Within 3 days</h5>
                                </div>
                                <div class="mr-5">
                                    <p class="text-muted small m-0 mb-1">CATEGORY</p>
                                    <h5 class="text-secondary font-weight-bold">Logo Design</h5>
                                </div>
                                <div class="mr-5">
                                    <p class="text-muted small m-0 mb-1">AVERAGE RATING</p>
                                    <h5 class="text-danger font-weight-bold"><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-8 pr-md-5">
                    <div class="mb-4">
                        <h2 class="font-weight-bold">About Us</h2>
                        {{ $profile->profile_bio }}

                    </div>
                    <div class="py-3">
                        <h2 class="font-weight-bold">Services</h2>
                        <div class="row">
                            @foreach($services as $service)<div class="col-md-4 py-3">
                                @include('services.row-service', ['service' => $service])
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <h2 class="font-weight-bold">Reviews</h2>
                    <div class="p-5 border">
                        <div class="">
                            <div class="height-250">
                                <h4 class="mb-3">Excellent Work from Koko</h4>
                                <h6 class="font-weight-normal">Lorem ipsum dolor sit amet non placerat risusLorem ipsum dolor sit amet, consectetur adipiscinge elit. Ut vitae mattis diam, non placerat risus</h6>
                                <h6 class="font-weight-normal">Lorem ipsum dolor sit amet non placerat risusLorem ipsum dolor sit amet, consectetur adipiscinge elit. Ut vitae mattis diam, non placerat risus</h6>
                                <h5 class="text-danger mt-4 font-weight-bold"><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i></h5>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=50&h=50&q=60" class="rounded-circle" />
                                </div>
                                <div class="m-0 p-0 ml-2">
                                    <span class="text-secondary font-weight-bold">Jane Doe</span>
                                    <span class="text-muted small d-block">Customer</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="py-4">
                        <h2 class="font-weight-bold">Gallery</h2>
                        <div class="row">
                            @foreach($profile->images as $image)
                                <div class="col-md-6 col-4">
                                    <img src="{{ $image->full_url }}" class="shadow-sm img-fluid p-2 my-2">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
