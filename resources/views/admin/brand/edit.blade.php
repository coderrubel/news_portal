@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Add Footer Advertisement 1170x100</div>
                        <div class="card card-body">
                            <form action="{{ url('brand/update/'.$brands->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                                <div class="my-2">
                                    <label for="name" class="form-label">Update Footer Advertisement Name*</label>
                                    @error('brand_name') <p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="text" name="brand_name" value="{{ $brands->brand_name }}" class="form-control rounded" id="name" placeholder="Update Footer Advertisement Name">
                                </div>
                                <div class="my-2">
                                    <label for="url" class="form-label">Update Footer Advertisement URL</label>
                                    @error('brand_url') <p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="text" name="brand_url" value="{{ $brands->brand_url }}" class="form-control rounded" id="url" placeholder="Update Footer Advertisement URL">
                                </div>
                                <!-- Brand Image -->
                                <div class="my-2">
                                    <label for="image" class="form-label">Update Footer Advertisement Image</label>
                                    @error('brand_image')<p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="file" name="brand_image" class="form-control rounded mb-3" id="image">
                                    <img src="{{ asset($brands->brand_image) }}" style="max-width:100%; max-height:250px;" alt="brand_image"><br>
                                    <button type="submit" class="btn btn-primary mt-2">Update Footer Advertisement</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
