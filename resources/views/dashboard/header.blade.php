<div class="mb-4">
    <div class="d-flex justify-content-between">
        <div class="media d-flex align-items-center">
            <img src="{{ \Auth::user()->profile->profile_full_avatar }}" width="80" class="mr-3" alt="...">
            <div class="media-body">
                <h2 class="m-0"><span class="text-danger">{{ \Auth::user()->name }}</span> / {{ $title }}</h2>
                <p class="text-muted m-0"> {{ $subtitle }}</p>
            </div>
        </div>
        <div>
            @isset($createRoute)<a href="{{ route($createRoute) }}" class="btn btn-primary btn-lg text-white">Add New</a>@endisset
        </div>
    </div>
</div>
