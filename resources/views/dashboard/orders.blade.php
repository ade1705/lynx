@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('dashboard.menu')
            </div>
            <div class="col-md-10">
                @include('dashboard.header')
                <orders></orders>
            </div>
        </div>
    </div>
</div>
@endsection
