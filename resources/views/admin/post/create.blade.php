@extends('admin.master')


@section('content')


<div class="col-md-6">

    <div class="card">
        <form action="{{route('admin.posts.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title">Post Form</h4>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title EN</label>
                    <div class="col-sm-9">
                        <input name="title_en" type="text" class="form-control" id="fname" placeholder="First Name Here">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title RU</label>
                    <div class="col-sm-9">
                        <input name="title_ru" type="text" class="form-control" id="fname" placeholder="First Name Here">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title UZ</label>
                    <div class="col-sm-9">
                        <input name="title_uz" type="text" class="form-control" id="fname" placeholder="First Name Here">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Body</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="body_en" id="editor1" cols="30" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Body RU</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="body_ru" id="editor2" cols="30" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Body UZ</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="body_uz" id="editor3" cols="30" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">File Upload</label>
                    <div class="col-md-9">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-md-3 m-t-15">Category</label>
                    <div class="col-md-9">
                        <select name="category_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_en}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 m-t-15">Tags</label>
                    <div class="col-md-9">
                        <select name="tags[]" class="select2 form-control m-t-15" multiple="multiple" style="height: 36px;width: 100%;">

                            @foreach ($tags as $tag)

                            <option value="{{$tag->id}}">{{$tag->tag_en}}</option>

                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Ads?</label>
                    <div class="col-md-9">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input name="ads" value="1" type="checkbox" class="custom-control-input" id="customControlAutosizing1">
                            <label class="custom-control-label" for="customControlAutosizing1">Click, if this Post as Ads</label>
                        </div>
                    </div>
                </div>


            </div>
            <div class="border-top">
                <div class="card-body">
                    <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection