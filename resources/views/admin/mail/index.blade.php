@extends('admin.master')

@section('content')



<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Mail</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($mails as $mail)
                        <tr>
                            <td>{{$mail->id}}</td>
                            <td>{{$mail->name}}</td>
                            <td>{{$mail->email}}</td>
                            <td>{{$mail->message}}</td>

                            <td>
                                <form action="{{ route('admin.mail.destroy', $mail->id)}}" method="POST">
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
                {{ $mails->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>


</div>

@endsection