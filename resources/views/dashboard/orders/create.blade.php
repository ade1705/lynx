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
                <div class="row">
                    <div class="col-md-8">
                        <div class="bg-white p-4 shadow-sm">
                            <div class="">
                                <h4>Create new order</h4>
                                <p>Please feel in all the order details here</p>

                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}<br/>
                                    </div>
                                @endforeach

                                <form method="POST" action="/dashboard/orders">
                                    @csrf
                                    @include('dashboard.orders.order_form')
                                    <div>
                                        <button type="submit" class="btn btn-danger">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
