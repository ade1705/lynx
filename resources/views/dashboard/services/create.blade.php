@extends('layouts.admin')

@section('content')
<div class="">
    @include('dashboard.header')
    <div class="row">
        <div class="col-md-8">
            <div class="bg-white p-4 shadow-sm">
                <div class="">
                    <h4>Create new service</h4>
                    <p>Please feel free to put in all your personal details so we can contact you</p>

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}<br/>
                        </div>
                    @endforeach

                    <form method="POST" action="/dashboard/services/store">
                        @csrf
                        @include('dashboard.services.service_form')
                        <div>
                            <button type="submit" class="btn btn-danger">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
