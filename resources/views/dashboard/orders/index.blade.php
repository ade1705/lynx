@extends('layouts.admin')

@section('content')
    <div>
        @include('dashboard.header')
        <orders :orders="{{ $orders }}" :user_id="'{{ \Auth::user()->id }}'"></orders>
    </div>
@endsection
