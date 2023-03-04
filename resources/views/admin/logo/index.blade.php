@extends('admin.admin_master')
@section('admin')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card card-header">Logo</div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SL No</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Logo</th>
                        <th scope="col" class="text-center">Created At</th>
                        <th scope="col" class="text-right">Action</th>
                    </tr>
                    @php($i=1)
                    @foreach($logos as $logo)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td class="text-center">{{ $logo->name }}</td>
                        <td class="text-center"><img src="{{ asset($logo->image) }}" style="height:50px; width:150px;"></td>
                        <td class="text-center">
                            @if($logo->created_at == NULL)
                            <span class="text-danger">No Date Set</span>
                            @else 
                                {{ $logo->created_at->diffForHumans() }}
                            @endif
                        </td>
                        <td class="text-right">
                            <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                <li class="dropdown-item">
                                    <a href="{{ url('/logo/edit/'.$logo->id) }}">Edit</a>
                                </li>
                                <li class="dropdown-item">
                                    <a href="{{ url('/logo/delete/'.$logo->id) }}">Delete</a>
                                </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </thead>
            </table>
        </div>
    </div>
    <!-- Add Ads -->
    <div class="col-md-4">
        <div class="card">
            <div class="card card-header">Add Logo</div>
            <div class="card card-body">
                <form action="{{ route('store.logo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="name" class="form-label">Logo Name*</label>
                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror    
                    <input type="text" name="name" class="form-control rounded" id="name" placeholder="Logo Name">
                    <label for="addimg" class="form-label mt-2">Logo Image*</label>
                    @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                    <input type="file" name="image" class="form-control rounded" id="addimg">
                    <button type="submit" class="btn btn-primary mt-3">Add Logo</button>
                </form>  
            </div>
        </div>
    </div>
</div>
@endsection