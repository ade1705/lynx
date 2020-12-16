<div class="bg-white shadow-sm">
    <div class="service-image height-300 overflow-hidden">
        <a href="/services/{{ $service->service_slug }}">
            <img class="img-fluid" src="{{ $service->service_image }}" />
        </a>
    </div>
    <div class="p-4">
        <div class="height-35 overflow-hidden">
            <a href="/services/{{ $service->service_slug }}"><h5 class="font-weight-500"> {{ $service->service_title }}</h5></a>
        </div>
        <div class="d-flex">
            <img width="30" src="/uploads/{{ $service->user->profile->profile_avatar }}" class="rounded shadow" />
            <div class="ml-2 d-flex align-items-center"><a href="/service-providers/{{ $service->user->profile->profile_id }}" class="font-weight-500 text-capitalize">{{ $service->user->name }}</a></div>
            <div class="ml-auto d-flex align-items-center">
                <h5 class="m-0">{{ $service->formatted_service_price }}</h5>
            </div>
        </div>
    </div>
</div>
