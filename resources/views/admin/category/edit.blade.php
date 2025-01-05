@extends('admin.master')

@section('content')
<div class="col-md-6">
    <div class="card">
        <!-- Блок для отображения ошибок валидации -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.categories.update', $category->id) }}" class="form-horizontal" method="POST">
            @method('PUT')
            @csrf
            <div class="card-body">
                <h4 class="card-title">Category Form</h4>
                <div class="form-group row">
                    <label for="category_en" class="col-sm-3 text-right control-label col-form-label">Category EN</label>
                    <div class="col-sm-9">
                        <input name="category_en" value="{{ old('category_en', $category->category_en) }}" type="text" class="form-control" id="category_en" placeholder="Enter Category in English">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category_ru" class="col-sm-3 text-right control-label col-form-label">Category RU</label>
                    <div class="col-sm-9">
                        <input name="category_ru" value="{{ old('category_ru', $category->category_ru) }}" type="text" class="form-control" id="category_ru" placeholder="Enter Category in Russian">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category_uz" class="col-sm-3 text-right control-label col-form-label">Category UZ</label>
                    <div class="col-sm-9">
                        <input name="category_uz" value="{{ old('category_uz', $category->category_uz) }}" type="text" class="form-control" id="category_uz" placeholder="Enter Category in Uzbek">
                    </div>
                </div>

            </div>
            <div class="border-top">
                <div class="card-body">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection