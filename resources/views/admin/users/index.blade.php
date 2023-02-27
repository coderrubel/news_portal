@extends('admin.admin_master')
@section('admin')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card card-header">All Users - {{ count($users)}}</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Serial</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Roll</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{$i++}}</td>
                            <td class="text-center">{{$user->name }}</td>
                            <td class="text-center">{{$user->email }}</td>
                            <td class="text-center">@if($user->type == 1) Admin @elseif($user->type == 2) Mentor @else User @endif</td>
                            <td class="text-center">
                                <a href="{{ url('/user/edit/'.$user->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ url('/user/delete/'.$user->id) }}" class="btn btn-sm btn-danger disabled" onclick="return confirm('Are you sure to delete')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
