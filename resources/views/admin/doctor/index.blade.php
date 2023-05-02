@extends('admin.admin_master')
@section('admin')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card p-3">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-1" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="table-responsive-sm table-responsive-md">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Specialist</th>
                            <th class="text-center">District</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Updated</th>
                            <th scope="col" class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $row)
                        <tr>
                            <td class="text-center">{{ $row->name }}</td>
                            <td class="text-center">{{ $row->specialist }}</td>
                            <td class="text-center">{{ $row->district }}</td>
                            <td class="text-center"><img src="{{ asset($row->photo) }}" style="height:40px; width:70px;"></td>
                            <td class="text-center">
                                @if($row->updated_at == NULL)
                                    {{ $row->created_at->diffForHumans() }}
                                @else 
                                    {{ $row->updated_at->diffForHumans() }}
                                @endif
                            </td>
                            <td class="text-right">
                                <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                    <li class="dropdown-item">
                                        <a href="{{ url('doctor/edit/'.$row->id) }}"><span class="btn btn-sm btn-info">Edit</span></a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{ url('doctor/delete/'.$row->id) }}"><span class="btn btn-sm btn-danger">Delete</span></a>
                                    </li>
                                    </ul>
                                </div>
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