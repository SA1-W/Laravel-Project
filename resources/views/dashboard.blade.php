@extends('admin.master')

@section('info')

<!-- Column -->
<div class="col-md-6 col-lg-2 col-xlg-3">
    <div class="card card-hover">
        <div class="box bg-cyan text-center">
            <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
            <h6 class="text-white">Dashboard</h6>
        </div>
    </div>
</div>
<!-- Column -->
<a class="col-md-6 col-lg-4 col-xlg-3" href="{{route('admin.categories.index')}}">

    <div class="card card-hover">
        <div class="box bg-success text-center">
            <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>

            <h6 class="text-white">Categories</h6>

        </div>
    </div>

</a>
<!-- Column -->
<a href="{{route('admin.posts.index')}}" class="col-md-6 col-lg-2 col-xlg-3">
    <div class="card card-hover">
        <div class="box bg-warning text-center">
            <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
            <h6 class="text-white">Posts</h6>
        </div>
    </div>
</a>
<!-- Column -->
<div class="col-md-6 col-lg-2 col-xlg-3">
    <div class="card card-hover">
        <div class="box bg-danger text-center">
            <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
            <h6 class="text-white">Tags</h6>
        </div>
    </div>
</div>

<!-- Column -->

@endsection

@section('content')
<h1>Welcome to Admin's Dashboard</h1>
@endsection