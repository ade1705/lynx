@extends('layouts.admin')

@section('content')
<div class="">
    @include('dashboard.header')
    <messages :messages="{{ $messages }}" :user-id="{{ \Illuminate\Support\Facades\Auth::user()->id }}"></messages>
</div>
@endsection
