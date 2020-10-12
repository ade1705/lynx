@extends('layouts.admin')

@section('content')
<div>
    @include('dashboard.header')
    sdd
    <orders :orders="'{{ $orders }}'"></orders>
</div>
@endsection
