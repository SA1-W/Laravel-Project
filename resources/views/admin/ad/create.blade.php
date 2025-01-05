@extends('admin.master')


@section('content')


<div class="col-md-6">

    <div class="card">
        <form action="{{route('admin.ads.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title">Ad Form</h4>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">AD URL_1</label>
                    <div class="col-sm-9">
                        <input name="url_1" type="text" class="form-control" id="fname" placeholder="AD URL_1">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">AD Image_1</label>
                    <div class="col-sm-9">
                        <input name="image_1" type="file" class="form-control" id="fname">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">AD URL_2</label>
                    <div class="col-sm-9">
                        <input name="url_2" type="text" class="form-control" id="fname" placeholder="AD URL_2">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">AD Image_2</label>
                    <div class="col-sm-9">
                        <input name="image_2" type="file" class="form-control" id="fname">
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