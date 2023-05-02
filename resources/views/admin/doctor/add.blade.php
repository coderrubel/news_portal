@extends('admin.admin_master')
@section('admin')
<script>
tinymce.init({
    selector: '#mytextarea'
});
</script>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card card-header">Add Doctor </div>
            <div class="card card-body">
                <form action="{{ route('add.doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-2">
                        <!-- Name -->
                        <label for="post" class="form-label mt-2 mb-1">Doctor Name *</label>
                        @error('name')<p class="text-danger">{{ $message }}</p>@enderror    
                        <input type="text" name="name" class="form-control rounded mb-2" id="post" placeholder="Doctor Name">
                        <!-- specialist -->
                        <label for="post" class="form-label mt-2 mb-1">Doctor Specialist *</label>
                        @error('specialist')<p class="text-danger">{{ $message }}</p>@enderror    
                        <input type="text" name="specialist" class="form-control rounded mb-2" id="post" placeholder="Specialist">
                        <!-- district -->
                        <label for="post" class="form-label mt-2 mb-1">District *</label>
                        @error('district')<p class="text-danger">{{ $message }}</p>@enderror    
                        <input type="text" name="district" class="form-control rounded mb-2" id="post" placeholder="District">
                        <!-- chamber -->
                        <label class="form-label mt-2 mb-1">Chamber and Appointment *</label>
                        @error('chamber')<p class="text-danger">{{ $message }}</p>@enderror 
                        <textarea name="chamber" id="mytextarea" class="form-control  mb-2" row="15"></textarea>
                        <!-- photo -->
                        <label for="photo" class="form-label mt-2 mb-1">Doctor Photo *</label>
                        @error('photo')<p class="text-danger">{{ $message }}</p>@enderror    
                        <input type="file" class="form-control-file form-control mb-2 p-2" id="photo" name="photo">
                        <button type="submit" class="btn btn-primary mt-2">Add Doctor</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>
@endsection