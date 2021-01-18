<div class="row">
    <div class="col-md-7 d-flex align-items-end py-2 py-md-5 min-height-500">
        <div>
            @auth<p class="mb-0 font-weight-bolder text-primary">Hi {{ \Illuminate\Support\Facades\Auth::user()->name }}, </p>@endauth
            <p class="text-danger font-weight-bold">GET STARTED NOW</p>
            <h1 class="font-weight-500 display-4 text-primary">Your gateway to affordable professionals.</h1>
            <p class="text-muted py-4"></p>
            <div class="position-absolute w-100 w-md-150 z-index-5" style="margin-top: -25px; left: 0">
                <div class="d-flex p-3 bg-white rounded shadow-sm">
                    <form class="d-flex w-100" action="/services/search" method="post">
                        @csrf
                        <div class="d-flex align-items-center">
                            <i data-feather="search"></i>
                        </div>
                        <select name="category_id" class="bg-transparent border-0 ml-3 p-0 m-0 w-100 outline-0 mr-3" role="button">
                            <option value="0">ALL</option>
                            @foreach(\App\Lib\Services\Service::SERVICE_CATEGORIES as $index => $service)
                                <option value="{{ $index }}">{{ $service }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary px-4" type="submit">Search</button>
                    </form>
                </div>
            </div>
            {{--        <p class="py-3"><i data-feather="trending-up" class="text-danger"></i> Quick search:--}}
            {{--            <u><a href="/services" class="text-danger">Logo Designs, </a></u>--}}
            {{--            <u><a href="/services" class="text-danger">Web Development, </a></u>--}}
            {{--            <u><a href="/services" class="text-danger">Aso Oke, </a></u>--}}
            {{--            <u><a href="/services" class="text-danger">Bridal Services, </a></u>--}}
            {{--        </p>--}}
            <p class="py-5 mt-3"><i data-feather="trending-up" class="text-danger"></i> Quick tip: <span class="text-danger">Choose a category and search</span>
            </p>
        </div>
    </div>
    <div class="col-md-5 text-right">
        <hero-carousel></hero-carousel>
    </div>
</div>
