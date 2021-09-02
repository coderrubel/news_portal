@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Update Slider </div>
                        <div class="card card-body">
                            <form action="{{ url('slider/update/'.$sliders->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                                <!-- Title -->
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Title</label>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="title" value="{{ $sliders->title }}" class="form-control rounded" id="addcategory" placeholder="Update Title">
                                </div>
                                <!-- Description -->
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Description</label>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ $sliders->description }}</textarea>
                                    
                                </div>
                                <!-- Brand Image -->
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Slider Image</label>
                                    @error('brnad_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="file" name="image" class="form-control rounded mb-3" id="addimg">
                                    <img src="{{ asset($sliders->image) }}" style="width:400px; height:200px;" alt="slider_image"><br>
                                    
                                    <button type="submit" class="btn btn-primary mt-2">Update Slider</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection