@extends('admin.master')

@section('content')
<div class="col-md-6">
    <div class="card">
        <form class="form-horizontal" method="POST" action="{{ route('admin.adminProfile.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <h4 class="card-title">{{$user->name}} Profile</h4>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                    <div class="col-sm-9">
                        <input value="{{ $user->name }}" type="text" class="form-control" id="fname" name="name" placeholder="First Name Here">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email Here">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input value="" type="password" class="form-control" id="password" name="password" placeholder="Password Here">
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection