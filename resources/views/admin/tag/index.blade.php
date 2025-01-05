@extends('admin.master')

@section('content')



<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tag Datatable</h5>
            <a class="btn btn-success" style="margin: 10px 0;" href="{{route('admin.tags.create')}}"><i class="fa-solid fa-plus"></i></a>
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
                            <th>Name EN</th>
                            <th>Name RU</th>
                            <th>Name UZ</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->tag_en}}</td>
                            <td>{{$tag->tag_ru}}</td>
                            <td>{{$tag->tag_uz}}</td>
                            <td>{{$tag->slug}}</td>
                            <td>{{$tag->created_at}}</td>



                            </td>
                            <td><a class="btn btn-warning" href="{{route('admin.tags.edit',$tag->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td>
                                <form action="{{route('admin.tags.destroy',$tag->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach






                    </tbody>

                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $tags->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>


</div>

@endsection