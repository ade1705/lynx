<div class="mb-3 shadow-sm">
    <div class="service-image height-300 overflow-hidden">
        <a href="/services/{{ $service->service_slug }}">
            <img class="img-fluid" src="{{ $service->service_image }}" />
        </a>
    </div>
    <div class="p-4 bg-white">
        <div class="pb-4 " style="margin-top: -60px">
            <a href="/services/categories/{{ $service->service_category_id }}" class="font-weight-500">
                <span class="py-2 pr-4 pl-2 rounded-pill" style="background: #feb2b2">
                <svg height="20" width="20">
                  <circle cx="10" cy="10" r="10" fill="#e3342f" />
                </svg>
                {{ $service->category }}</span>
            </a>
        </div>
        <div>
            <h5 class="my-2 text-danger">{{ $service->formatted_service_price }}</h5>
        </div>
        <div class="height-65 overflow-hidden">
            <a href="/services/{{ $service->service_slug }}"><h3 class="font-weight-500"> {{ $service->service_title }}</h3></a>
        </div>
        <div class="d-flex">
            <img width="30" height="30" src="{{ $service->user->profile->profile_full_avatar }}" class="rounded shadow" />
            <div class="ml-2 d-flex align-items-center"><a href="/service-providers/{{ $service->user->profile->profile_id }}" class="font-weight-500 text-capitalize">{{ $service->user->name }}</a></div>
            <div class="ml-auto d-flex align-items-center">

            </div>
        </div>
    </div>
</div>
