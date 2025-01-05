@extends('admin.master')


@section('content')


<div class="col-md-6">

    <div class="card">
        <form action="{{route('admin.tags.store')}}" class="form-horizontal" method="POST">
            @csrf
            <div class="card-body">
                <h4 class="card-title">Tag Form</h4>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tag EN</label>
                    <div class="col-sm-9">
                        <input name="tag_en" type="text" class="form-control" id="fname" placeholder="First Name Here">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tag RU</label>
                    <div class="col-sm-9">
                        <input name="tag_ru" type="text" class="form-control" id="fname" placeholder="First Name Here">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tag UZ</label>
                    <div class="col-sm-9">
                        <input name="tag_uz" type="text" class="form-control" id="fname" placeholder="First Name Here">
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