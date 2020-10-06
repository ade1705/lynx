@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('dashboard.menu')
            </div>
            <div class="col-md-10">
                @include('dashboard.header', ['createRoute' => 'dashboard-orders-new'])
                <orders :orders="{{ $orders }}"></orders>
                <input id="card-holder-name" type="text">

                <!-- Stripe Elements Placeholder -->
                <div id="card-element"></div>

                <button id="card-button">
                    Process Payment
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
