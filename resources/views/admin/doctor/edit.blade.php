@extends('admin.admin_master')
@section('admin')

<!-- Text editor -->
<script>
tinymce.init({
    selector: '#mytextarea'
});
</script>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Edit Doctor</div>
                        <div class="card card-body">
                            <form action="{{ url('doctor/update/'.$doctor->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="my-2">
                                    <!-- Name -->
                                    <label for="addcategory" class="form-label mb-0">Name</label>
                                    @error('Name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="name" value="{{ $doctor->name }}" class="form-control rounded" placeholder="Name">
                                    <!-- specialist -->
                                    <label for="post" class="form-label mt-2 mb-1">Doctor Specialist *</label>
                                    @error('specialist')<p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="text" name="specialist" value="{{ $doctor->specialist }}" class="form-control rounded mb-2" id="post" placeholder="Specialist">
                                    <!-- district -->
                                    <label for="post" class="form-label mt-2 mb-1">District *</label>
                                    @error('district')<p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="text" name="district" value="{{ $doctor->district }}" class="form-control rounded mb-2" id="post" placeholder="District">
                                    <!-- chamber -->
                                    <label class="form-label mt-2 mb-1">Chamber and Appointment *</label>
                                    @error('chamber')<p class="text-danger">{{ $message }}</p>@enderror 
                                    <textarea name="chamber" id="mytextarea" class="form-control  mb-2" row="15">{{ $doctor->chamber }}</textarea>
                                    <!-- photo -->
                                    <label for="photo" class="form-label mt-2 mb-1">Doctor Photo *</label>
                                    @error('photo')<p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="file" class="form-control-file form-control mb-2 p-2" id="photo" name="photo">
                                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    
