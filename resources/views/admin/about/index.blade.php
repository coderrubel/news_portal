@extends('admin.admin_master')
@section('admin')
    
   
        <!-- All Category Section -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                   <a href="{{ route('add.about')}}" class="btn btn-md btn-primary mb-4">Add About</a>
                    <div class="card">
                        @if(session('success'))
                         <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card card-header">About</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:5%">SL</th>
                                    <th scope="col" style="width:15%">Title</th>
                                    <th scope="col" style="width:20%">Sort Description</th>
                                    <th scope="col" style="width:45%">Long Description</th>
                                    <th scope="col" style="width:15%; text-align:right">Action</th>
                                </tr>
                                @php($i=1)
                                @foreach($abouts as $about)
                                <tr>
                                    <td style="width:5%">{{$i++}}</td>
                                    <td style="width:15%">{{$about->title }}</td>
                                    <td style="width:20%">{{$about->sort_desc }}</td>
                                    <td style="width:45%">{{$about->long_desc }}</td>
                                    <td style="width:15%; text-align:right">
                                        <a href="{{ url('/about/edit/'.$about->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ url('/about/delete/'.$about->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Add Brand
                <div class="col-md-4">
                    <div class="card">
                        <div class="card card-header">Add Slider </div>
                        <div class="card card-body">
                            <form action="{{ route('store.brand')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Slider Name</label>
                                    @error('brand_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="brand_name" class="form-control rounded" id="addcategory" placeholder="Brand Name">
                                    <label for="addimg" class="form-label">Brand Image</label>
                                    @error('brand_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="file" name="brand_image" class="form-control rounded" id="addimg">
                                    <button type="submit" class="btn btn-primary mt-2">Add Brand</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
                 -->
            </div>
@endsection
