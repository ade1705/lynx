@extends('layouts.app')

@section('content')
    <div class="py-5">
        <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="input-group shadow my-0 mr-2 flex-grow-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-right-0 border-top-0 border-bottom-0 border-danger border-left">
                                    <i data-feather="search"></i>
                                </span>
                            </div>
                            <input type="text" placeholder="Search" class="form-control border-width-3 py-4 bg-white border-0">
                            <div class="input-group-append pr-3">
                                <span class="input-group-text bg-white border-0 text-muted" role="button">Clear</span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="container">
        <div>
            <h3 class="text-muted">40 Services found</h3>
        </div>
        <div class="row">
            @for($i=0; $i<=7; $i++)
                <div class="col-md-3 py-3">
                    @include('services.row-service')
                </div>
            @endfor
        </div>
    </div>
@endsection
