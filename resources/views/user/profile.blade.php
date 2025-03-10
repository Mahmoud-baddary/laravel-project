@extends('layouts.app')

@section('content')
    <div class="container ">
        <h4>Welcome <i>{{ $user->name }}</i></h4>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center">
            <x-alerts.errors></x-alerts.errors>
        </div>

        <form class="card p-5" enctype="multipart/form-data" method="post" action="{{ route('profile.store') }}">
            @csrf
            <div class="d-flex justify-content-center">
                <img src="{{ asset(@$profile->avatar)}}" class="object-fit-cover rounded-circle" width="120px" height="120px">
            </div>
            <div class="d-flex justify-content-between flex-md-row flex-column">
                <div class="mb-3">
                    <label class="form-label fw-bold" for="userName">User name </label>
                    <input class="form-control" style="width: 400px" type="text" id="userName" name="userName"
                        value="{{ $user->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold" for="email">Email</label>
                    <input class="form-control" style="width: 400px" type="email" id="email" name="email"
                        value="{{ $user->email }}" disabled>
                </div>
            </div>
            <div class="d-flex justify-content-between flex-md-row flex-column">
                <div class="mb-3">
                    <label class="form-label fw-bold" for="first_name">First name</label>
                    <input class="form-control" style="width: 400px" type="text" id="first_name" name="first_name"
                        value="{{ $profile->first_name ?? '' }}" placeholder="Enter first name here...">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold" for="last_name">Last name</label>
                    <input class="form-control" style="width: 400px" type="text" id="last_name" name="last_name"
                        value="{{ $profile->last_name ?? '' }}" placeholder="Enter last name here...">
                </div>
            </div>
            <div class="d-flex justify-content-between flex-md-row flex-column">
                <div class="mb-3">
                    <label class="form-label fw-bold" for="age">Age</label>
                    <input class="form-control" style="width: 400px" type="number" id="age" name="age"
                        value="{{ $profile->age ?? '' }}" placeholder="Enter age here...">
                </div>
                <div class="mb-3 d-flex align-items-center" style="width: 400px">
                    <h6>Gender:</h6>
                    &nbsp;&nbsp;
                    <label class="form-label fw-bold" for="male">Male</label>
                    &nbsp;
                    <input class="form-check" type="radio" id="male" name="gender" value="1"
                        {{ @$profile->gender == 1 ? 'checked' : '' }} required>
                    &nbsp;&nbsp;
                    <label class="form-label fw-bold" for="female">Female</label>
                    &nbsp;
                    <input class="form-check" type="radio" id="female" name="gender" value="0"
                        {{ @$profile->gender == 2 ? 'checked' : '' }} required>
                </div>
            </div>
            <div class="d-flex justify-content-between flex-md-row flex-column">
                <div class="mb-3">
                    <label class="form-label fw-bold" for="bio">Bio</label>
                    <textarea class="form-control" rows="5" style="width: 400px" id="bio" name="bio"
                        placeholder="Enter first name here...">{{ $profile->bio ?? '' }}</textarea>
                </div>
                <div class="mb-3" style="width: 400px">
                    <label class="form-label fw-bold" for="avatar">Avatar</label>
                    <input type="file" class="form-control" name="avatar" id="avatar">
                </div>

            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
@endsection
