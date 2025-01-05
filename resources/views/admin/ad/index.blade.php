@extends('admin.master')

@section('content')



<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ad Datatable</h5>
            @if($ads->isEmpty())
            <a class="btn btn-success" style="margin: 10px 0;" href="{{ route('admin.ads.create') }}"><i class="fa-solid fa-plus"></i></a>
            @endif
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
                            <th>Image_1</th>
                            <th>Url_1</th>
                            <th>Image_2</th>
                            <th>Url_2</th>
                            <th>Created At</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($ads as $ad)
                        <tr>
                            <td>{{$ad->id}}</td>
                            <td><img src="{{asset('temp/ad/' . $ad->image_1)}}" alt="" width="200" height="100"></td>
                            <td>{{$ad->url_1}}</td>
                            <td><img src="{{asset('temp/ad/' . $ad->image_2)}}" alt="" width="50" height="100"></td>
                            <td>{{$ad->url_2}}</td>
                            <td>{{$ad->created_at}}</td>



                            </td>
                            <td><a class="btn btn-warning" href="{{route('admin.ads.edit', $ad->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td>
                                <form action="{{route('admin.ads.destroy', $ad->id)}}" method="POST">
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

        </div>
    </div>


</div>

@endsection