@extends('admin.admin_master')
@section('admin')

        <!-- All Distric Section -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between card-header"><span>All District</span> <span>Total District: {{ count($districts)}} </span></div>
                    <div class="table-responsive-sm table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Division</th>
                                <th scope="col" class="text-center">District</th>
                                <th scope="col" class="text-center">Created At</th>
                                <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($districts as $row)
                                <tr>
                                <th scope="row">{{ $row->rDivision->division }}</th>
                                <td class="text-center">{{ $row->district }}</td>
                                <td class="text-center">{{ date('d-M-Y', strtotime($row->created_at)); }}</td>
                                <td class="text-right">
                                <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                    <li class="dropdown-item">
                                        <a href="{{ url('/district/edit/'.$row->id) }}">Edit</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{ url('/district/delete/'.$row->id) }}" onclick="return confirm('Are you sure to delete')">Delete</a>
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
            <!-- Add District -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card card-header">Add District</div>
                    <div class="card card-body">
                        <form action="{{ route('store.district')}}" method="POST">
                            @csrf
                            <div class="my-2">

                                <label for="addcategory" class="form-label d-block">Division Name</label>
                                <select name="division_id" class="form-control rounded mt-2">
                                    @foreach($divisions as $row)
                                    <option value="{{ $row->id }}">{{ $row->division }}</option>
                                    @endforeach
                                </select>

                                <label for="addcategory" class="form-label">District Name*</label>
                                @error('district')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="district" class="form-control rounded mb-2" id="addcategory" placeholder="District Name">
                                <button type="submit" class="btn btn-primary mt-2">Add</button>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
        
@endsection