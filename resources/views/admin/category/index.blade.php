@extends('admin.master')

@section('content')



<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Basic Datatable</h5>
            <a class="btn btn-success" style="margin: 10px 0;" href="{{route('admin.categories.create')}}"><i class="fa-solid fa-plus"></i></a>
            <div class="table-responsive">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Name RU</th>
                            <th>Name UZ</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)

                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_en}}</td>
                            <td>{{$category->category_ru}}</td>
                            <td>{{$category->category_uz}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->created_at}}</td>

                            <td><a class="btn btn-warning" href="{{route('admin.categories.edit',$category->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td>
                                <form action="{{route('admin.categories.destroy',$category->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach


                    </tbody>

                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>


</div>

@endsection