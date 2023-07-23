
@extends('admin.admin_master')
@section('admin')

        <!-- All Divison Section -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between card-header"><span>All Division</span> <span>Total Division: {{ count($divisions)}}</span></div>
                    <div class="table-responsive-sm table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">SL No</th>
                                <th scope="col" class="text-center">Division Name</th>
                                <th scope="col" class="text-center">Created At</th>
                                <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($divisions as $division)
                                <tr>
                                <th scope="row">{{ $divisions->firstItem()+$loop->index }}</th>
                                <td class="text-center">{{ $division->division }}</td>
                                <td class="text-center">
                                    @if($division->created_at == NULL)
                                        <span class="text-danger">No Date Set</span>
                                    @else 
                                        {{ $division->created_at->diffForHumans() }}
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="dropdown show d-inline-block widget-dropdown">
                                        <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                        <li class="dropdown-item">
                                            <a href="{{ url('/division/edit/'.$division->id) }}">Edit</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="{{ url('/division/delete/'.$division->id) }}">Delete</a>
                                        </li>
                                        </ul>
                                    </div>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mb-2 px-5">
                        {{ $divisions->links() }}
                    </div>
                </div>
            </div>
            <!-- Add Division -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card card-header">Add Division </div>
                    <div class="card card-body">
                        <form action="{{ route('store.division')}}" method="POST">
                            @csrf
                            <div class="my-2">
                                <label for="addcategory" class="form-label">Division Name</label>
                                @error('division')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="division" class="form-control rounded mb-2" id="addcategory" placeholder="Division Name">
                                <button type="submit" class="btn btn-primary mt-2">Add</button>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
        
@endsection