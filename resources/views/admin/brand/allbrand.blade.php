@extends('admin.admin_master')
@section('admin')
    
   
        <!-- All brand Section -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                         <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card card-header">All Footer Advertisement Size:1170x100</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">URL</th>
                                    <th scope="col" class="text-center">Image</th>
                                    <th scope="col" class="text-center">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                @php($i=1)
                                @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>{{ $brand->brand_url }}</td>
                                    <td><img src="{{ asset($brand->brand_image) }}" style="height:50px; width:150px;"></td>
                                    <td>
                                        @if($brand->created_at == NULL)
                                        <span class="text-danger">No Date Set</span>
                                        @else 
                                            {{ $brand->created_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown show d-inline-block widget-dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                            <li class="dropdown-item">
                                                <a href="{{ url('/brand/edit/'.$brand->id) }}">Edit</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="{{ url('/brand/delete/'.$brand->id) }}">Delete</a>
                                            </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Add Brand -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card card-header">Add Footer Advertisement Size:1170x100</div>
                        <div class="card card-body">
                            <form action="{{ route('store.brand')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="name" class="form-label">Footer Advertisement Name</label>
                                @error('brand_name')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="brand_name" class="form-control rounded" id="name" placeholder="Advertisement Name">
                                <label for="url" class="form-label mt-2">Footer Advertisement URL</label>
                                @error('brand_url')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="brand_url" class="form-control rounded" id="url" placeholder="Advertisement Link">
                                <label for="addimg" class="form-label mt-2">Footer Advertisement Image</label>
                                @error('brand_image')<p class="text-danger">{{ $message }}</p>@enderror
                                <input type="file" name="brand_image" class="form-control rounded" id="addimg">
                                <button type="submit" class="btn btn-primary mt-3">Add Advertisement</button>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
@endsection
