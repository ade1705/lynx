<div class="py-5 my-md-5 my-2 row">
    <div class="col-md-6">
        <p class="text-danger font-weight-bold">GET STARTED NOW</p>
        <h1 class="font-weight-bolder display-4 text-primary">The Simplest way to get your job done.</h1>
        <p class="text-muted">At BoxoPay, you can get your job done as fast as possible using some of the best professionals in the world. Get started now</p>
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
{{--        <p class="py-3"><i data-feather="trending-up" class="text-danger"></i> Quick search:--}}
{{--            <u><a href="/services" class="text-danger">Logo Designs, </a></u>--}}
{{--            <u><a href="/services" class="text-danger">Web Development, </a></u>--}}
{{--            <u><a href="/services" class="text-danger">Aso Oke, </a></u>--}}
{{--            <u><a href="/services" class="text-danger">Bridal Services, </a></u>--}}
{{--        </p>--}}
        <p class="py-3"><i data-feather="trending-up" class="text-danger"></i> Quick tip: <span class="text-danger">Choose a category and search</span>
        </p>
    </div>
    <div class="col-md-6 text-right">
        <img src="/img/croods.png" class="img-fluid" />
    </div>
</div>
