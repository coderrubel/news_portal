<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
           <div class="bg-success p-1 rounded text-white"> All Category</div>
        </div>
    </x-slot>
    
    <div class="py-12">
        <!-- All Category Section -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                         <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card card-header">All Brand</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                @foreach($brands as $brand)
                                <tr>
                                    <td></td>
                                    <td>{{$brand->brand_name }}</td>
                                    <td><img src="{{ asset($brand->brand_image) }}" style="height:40px; widht:70px;"></td>
                                    <td>
                                        @if($brand->created_at == NULL)
                                        <span class="text-danger">No Date Set</span>
                                        @else 
                                            {{ $brand->created_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/brand/edit/'.$brand->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ url('/brand/delete/'.$brand->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
                        <div class="card card-header">Add Brand </div>
                        <div class="card card-body">
                            <form action="{{ route('store.brand')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Brand Name</label>
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
            </div>
        </div>

    </div>
</x-app-layout>
