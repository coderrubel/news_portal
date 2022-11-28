@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Add Footer Advertisement </div>
                        <div class="card card-body">
                            <form action="{{ url('brand/update/'.$brands->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Footer Advertisement Name</label>
                                    @error('brnad_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="brand_name" value="{{ $brands->brand_name }}" class="form-control rounded" id="addcategory" placeholder="Update Footer Advertisement Name">
                                </div>
                                <!-- Brand Image -->
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Footer Advertisement Image</label>
                                    @error('brnad_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="file" name="brand_image" class="form-control rounded mb-3" id="addimg">
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
