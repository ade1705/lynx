@extends('layouts.admin')

@section('content')
<div>
    @include('dashboard.header')
    <h1>{{ \Auth::user()->id }}</h1>
</div>
@endsection
