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
                                <h4>Personal Details</h4>
                                <p>Please feel free to put in all your personal details so we can contact you</p>
                                <form>
                                    <div class="form-group">
                                        <label for="inputAddress small text-muted">Profile Picture</label>
                                        <div class="media d-flex p-3 border">
                                            <img src="https://images.unsplash.com/photo-1551741568-53a19562313c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=80&h=80&q=60" class="mr-3 rounded" alt="...">
                                            <div class="media-body">
                                                <div>

                                                    <button class="btn py-1 btn-primary mr-2">Upload newa photo</button>
                                                    <button class="btn btn-outline-danger py-1">Upload</button>
                                                </div>
                                                <small class="text-muted">Image sizes should not exceed 500kb</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4 small text-muted">Name</label>
                                            <input type="email" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4 small text-muted">Username</label>
                                            <input type="password" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" id="inputPassword4">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Bio</label>
                                        <textarea rows="6" class="p-0 form-control border-left-0 border-right-0 border-top-0 border-bottom"></textarea>
                                    </div>
                                    <div class="pt-5 border-bottom mb-5 text-muted">
                                        <h6 class="text-muted">ONLINE PRESENCE</h6>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Personal Website</label>
                                        <input type="password" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" id="inputPassword4">
                                    </div>
                                    <div class="form-row mt-5">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4 small text-muted">Instagram Account</label>
                                            <input type="email" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4 small text-muted">Twitter Account</label>
                                            <input type="password" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" id="inputPassword4">
                                        </div>
                                    </div>
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
