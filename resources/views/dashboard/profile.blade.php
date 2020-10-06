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
                                <p>Please feel free to put in all your personal details so we can contact you. Click <a href="/service-providers/{{ \Auth::User()->id }}">here</a> to view your profile</p>
                                <form action="/dashboard/profile/{{ $profile->profile_id }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputAddress small text-muted">Profile Picture</label>
                                        <div class="media d-flex p-3 border">
                                            <img src="{{ $profile->profile_full_avatar }}" class="mr-3 rounded" alt="..." width="80">
                                            <div class="media-body">
                                                <div class="">
                                                    <input type="file" name="profile_avatar" class="form-control"/>
                                                    <div class="small text-muted">Image sizes should not exceed 500kb</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Username</label>
                                            <input name="profile_username" type="text" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" value="{{ $profile->profile_username }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label >Bio</label>
                                        <textarea name="profile_bio" rows="6" class="p-0 form-control border-left-0 border-right-0 border-top-0 border-bottom">{{ $profile->profile_bio }}</textarea>
                                    </div>
                                    <div class="pt-5 border-bottom mb-5 text-muted">
                                        <h6 class="text-muted">ONLINE PRESENCE</h6>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Personal Website</label>
                                        <input name="profile_website" type="text" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" value="{{ $profile->profile_website }}">
                                    </div>
                                    <div class="form-row mt-5">
                                        <div class="form-group col-md-6">
                                            <label>Instagram Account</label>
                                            <input name="profile_instagram" type="text" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" value="{{ $profile->profile_instagram }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Twitter Account</label>
                                            <input type="text" name="profile_twitter" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" value="{{ $profile->profile_twitter }}">
                                        </div>
                                    </div>
                                    <div class="form-row mt-5">
                                        <div class="form-group col-md-6">
                                            <label>Facebook Account</label>
                                            <input type="text" name="profile_facebook" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" value="{{ $profile->profile_facebook }}">
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
