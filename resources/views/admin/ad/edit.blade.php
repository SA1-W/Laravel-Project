@extends('admin.master')


@section('content')


<div class="col-md-6">

    <div class="card">
        <form action="{{route('admin.ads.update', $ad->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <h4 class="card-title">Ad Form</h4>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">AD URL_1</label>
                    <div class="col-sm-9">
                        <input value="{{$ad->url_1}}" name="url_1" type="text" class="form-control" id="fname" placeholder="AD URL_1">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">AD Image_1</label>
                    <div class="col-sm-9">
                        <input name="image_1" type="file" class="form-control" id="fname">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">AD Image_1 Pic</label>
                    <div class="col-sm-9">
                        <img src="{{ asset('temp/ad/' . $ad->image_1)}}" alt="" width="300" height="200">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">AD URL_2</label>
                    <div class="col-sm-9">
                        <input value="{{$ad->url_2}}" name="url_2" type="text" class="form-control" id="fname" placeholder="AD URL_2">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">AD Image_2</label>
                    <div class="col-sm-9">
                        <input name="image_2" type="file" class="form-control" id="fname">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">AD Image_2 Pic</label>
                    <div class="col-sm-9">
                        <img src="{{ asset('temp/ad/' . $ad->image_2)}}" alt="" width="100" height="200">
                    </div>
                </div>

            </div>
            <div class="border-top">
                <div class="card-body">
                    <a href="{{route('admin.ads.index')}}" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection