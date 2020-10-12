@extends('layouts.admin')

@section('content')
<div class="">
    @include('dashboard.header', ['createRoute' => 'dashboard-services-new'])
    @if($services->count() === 0)
        <div class="py-5 text-center">
            <img src="https://robohash.org/sjdksdjk" />
            <h2 class="py-3">No Services found</h2>
        </div>
    @endif
    <div class="row">
        @foreach($services as $service)
            <div class="col-md-4 py-3">
                <div>
                    <a href="{{route('dashboard-services-edit', ['slug' => $service->service_slug])}}">edit</a>
                    <form action="/dashboard/services/delete/{{ $service->service_slug }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn">Delete</button>
                    </form>
                </div>
                @include('services.row-service', ['service' => $service])
            </div>
        @endforeach
    </div>
</div>
@endsection
