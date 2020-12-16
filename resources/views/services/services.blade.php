@extends('layouts.app')

@section('content')
    <div class="services-bg height-200 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <<div class="d-flex p-3 bg-white rounded shadow-sm">
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
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <h3 class="text-muted mt-4">{{ $services->count() }} Services found</h3>
        </div>
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4 py-3">
                    @include('services.row-service')
                </div>
            @endforeach
        </div>
    </div>
@endsection
