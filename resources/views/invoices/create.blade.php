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
                    <div class="p-3 bg-white shadow-sm">
                        <table class="table">
                            <thead class="">
                            <tr class="border-bottom small text-muted">
                                <th scope="col" class="border-0">CLIENT</th>
                                <th scope="col" class="border-0">JOB</th>
                                <th scope="col" class="border-0" v-bind:class="showMessage ? 'd-none' : 'd-display'">STATUS</th>
                                <th scope="col" class="border-0" v-bind:class="showMessage ? 'd-none' : 'd-display'">CREATED</th>
                                <th scope="col" class="border-0"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="" role="button" @click="toggleMessage()"  v-for="item in items" :key="item.message">
                                <th>
                                    <div class="media">
                                        <img src="https://images.unsplash.com/photo-1551741568-53a19562313c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=50&h=50&q=60" class="mr-3 rounded-circle" alt="...">
                                        <div class="media-body">
                                            <h5 class="m-0">Ade Oluwa</h5>
                                            <small class="text-muted">ade@ade.com</small>
                                        </div>
                                    </div>
                                </th>
                                <td>Aso Oke Design</td>
                                <td><small class="badge badge-warning py-1 px-2"  v-bind:class="showMessage ? 'd-none' : 'd-display'">In Progress</small></td>
                                <td class="text-muted" v-bind:class="showMessage ? 'd-none' : 'd-display'">24/05/2020</td>
                                <td class="text-muted"><i data-feather="chevron-right"></i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
