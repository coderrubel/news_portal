@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Add Header Logo</div>
                        <div class="card card-body">
                            <form action="{{ url('logo/update/'.$logos->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $logos->image }}">
                                <div class="my-2">
                                    <label for="name" class="form-label">Update Logo Name*</label>
                                    @error('name') <p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="text" name="name" value="{{ $logos->name }}" class="form-control rounded" id="name" placeholder="Update Footer Advertisement Name">
                                </div>
                                <div class="my-2">
                                    <label for="image" class="form-label">Update Logo Image</label>
                                    @error('image')<p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="file" name="image" class="form-control rounded mb-3" id="image">
                                    <img src="{{ asset($logos->image) }}" style="max-width:100%; max-height:250px;" alt="Logo"><br>
                                    <button type="submit" class="btn btn-primary mt-2">Update Logo</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
