@extends('admin.master')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Post Datatable</h5>
            <a class="btn btn-success" style="margin: 10px 0;" href="{{route('admin.posts.create')}}"><i class="fa-solid fa-plus"></i></a>
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
                            <th>Title</th>
                            <th>Title RU</th>
                            <th>Title UZ</th>
                            <th>Body</th>
                            <th>Body RU</th>
                            <th>Body UZ</th>
                            <th>Image</th>
                            <th>Category_id</th>
                            <th>Slug</th>
                            <th>Views</th>
                            <th>Created At</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{ Str::limit($post->title_en ,20)}} </td>
                            <td>{{ Str::limit($post->title_ru ,20)}}</td>
                            <td>{{ Str::limit($post->title_uz ,20)}}</td>
                            <td>{!!Str::limit($post->body_en , 60)!!}</td>
                            <td>{!!Str::limit($post->body_ru , 60)!!}</td>
                            <td>{!!Str::limit($post->body_uz , 60)!!}</td>
                            <td>{{$post->image}}</td>
                            <td>{{$post->category->category_en}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->views}}</td>
                            <th>{{$post->created_at}}</th>

                            <td><a class="btn btn-warning" href="{{route('admin.posts.edit',$post->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td>
                                <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
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
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection