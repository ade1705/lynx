@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        @include('dashboard.header')
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    @include('dashboard.menu')
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
