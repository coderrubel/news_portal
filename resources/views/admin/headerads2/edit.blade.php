@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Add Header Advertisement</div>
                        <div class="card card-body">
                            <form action="{{ url('header2/update/'.$ads->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $ads->ads_image }}">
                                <div class="my-2">
                                    <label for="name" class="form-label">Update Advertisement Name*</label>
                                    @error('ads_name') <p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="text" name="ads_name" value="{{ $ads->ads_name }}" class="form-control rounded" id="name" placeholder="Update Footer Advertisement Name">
                                </div>
                                <div class="my-2">
                                    <label for="url" class="form-label">Update Advertisement URL</label>
                                    @error('ads_url') <p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="text" name="ads_url" value="{{ $ads->ads_url }}" class="form-control rounded" id="url" placeholder="Update Footer Advertisement URL">
                                </div>
                                <!-- Brand Image -->
                                <div class="my-2">
                                    <label for="image" class="form-label">Update Advertisement Image</label>
                                    @error('ads_image')<p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="file" name="ads_image" class="form-control rounded mb-3" id="image">
                                    <img src="{{ asset($ads->ads_image) }}" style="max-width:100%; max-height:250px;" alt="ads_image"><br>
                                    <button type="submit" class="btn btn-primary mt-2">Update Advertisement</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
