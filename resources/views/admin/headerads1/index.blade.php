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
            <div class="card card-header">All Header Advertisement Size:1170x100</div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SL No</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">URL</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Created At</th>
                        <th scope="col" class="text-right">Action</th>
                    </tr>
                    @php($i=1)
                    @foreach($ads as $ad)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td class="text-center">{{ $ad->ads_name }}</td>
                        <td class="text-center">{{ $ad->ads_url }}</td>
                        <td class="text-center"><img src="{{ asset($ad->ads_image) }}" style="height:50px; width:150px;"></td>
                        <td class="text-center">
                            @if($ad->created_at == NULL)
                            <span class="text-danger">No Date Set</span>
                            @else 
                                {{ $ad->created_at->diffForHumans() }}
                            @endif
                        </td>
                        <td class="text-right">
                            <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                <li class="dropdown-item">
                                    <a href="{{ url('/header1/edit/'.$ad->id) }}">Edit</a>
                                </li>
                                <li class="dropdown-item">
                                    <a href="{{ url('/header1/delete/'.$ad->id) }}">Delete</a>
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
            <div class="card card-header">Add Header Advertisement</div>
            <div class="card card-body">
                <form action="{{ route('store.header1')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="name" class="form-label">Advertisement Name*</label>
                    @error('ads_name')<p class="text-danger">{{ $message }}</p>@enderror    
                    <input type="text" name="ads_name" class="form-control rounded" id="name" placeholder="Advertisement Name">
                    <label for="url" class="form-label mt-2">Advertisement URL</label>
                    @error('ads_url')<p class="text-danger">{{ $message }}</p>@enderror    
                    <input type="text" name="ads_url" class="form-control rounded" id="url" placeholder="Advertisement Link">
                    <label for="addimg" class="form-label mt-2">Advertisement Image*</label>
                    @error('ads_image')<p class="text-danger">{{ $message }}</p>@enderror
                    <input type="file" name="ads_image" class="form-control rounded" id="addimg">
                    <button type="submit" class="btn btn-primary mt-3">Add Advertisement</button>
                </form>  
            </div>
        </div>
    </div>
</div>
@endsection