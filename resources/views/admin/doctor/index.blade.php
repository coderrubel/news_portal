@extends('admin.admin_master')
@section('admin')
@php
$auth = Auth::user()->id;
$rolls = DB::table('users')->select('users.type','users.id')->where('users.id', $auth)->first();
@endphp
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
                            <th class="text-center">Division</th>
                            <th class="text-center">District</th>
                            <th class="text-center">Specialist</th>
                            <th class="text-center">Photo</th>
                            @if($rolls->type == 'admin' || $rolls->type == 'mentor')
                            <th class="text-center">View</th>
                            <th class="text-center">Status</th>
                            @endif
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $row)
                        <tr>
                            <td class="text-center">{{ $row->name }}</td>
                            <td class="text-center">{{ $row->rDivision->division  }}</td>
                            <td class="text-center">{{ $row->rDistrict->district }}</td>
                            <td class="text-center">{{ $row->specialist }}</td>
                            <td class="text-center"><img src="{{ asset($row->photo) }}" style="height:40px; width:70px;"></td>
                            @if($rolls->type == 'admin' || $rolls->type == 'mentor')
                            <td class="text-center">{{ $row->view??'' }}</td>
                            <td class="text-center">
                                <div id="dd{{$row->id}}">
                                @if($row->status == 'inactive') 
                                <span class="btn btn-sm btn-danger" onclick="dstatusChange(<?php echo $row->id ?>,<?php echo '0' ?>)">Inactive</span>   
                                @elseif($row->status == 'active')
                                <span class="btn btn-sm btn-success" onclick="dstatusChange(<?php echo $row->id ?>,<?php echo '1' ?>)">Active</span>      
                                @endif
                                </div>
                            </td>
                            @endif
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