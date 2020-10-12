@extends('layouts.admin')

@section('content')
    <div>
        @include('dashboard.header')
        <orders :orders="{{ $orders }}"></orders>
    </div>
@endsection
