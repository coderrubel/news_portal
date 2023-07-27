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
                        <!-- division district specialist -->
                        <div class="row">
                            <div class="col-md-4">
                                <label for="addcategory" class="form-label d-block">Select Division</label>
                                <select name="division" class="form-control rounded mt-2" id="divis" onchange="getDivis();">
                                    <option>Select Division</option>
                                    @foreach($divisions as $row)
                                    <option value="{{ $row->id }}">{{ $row->division }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="addcategory" class="form-label d-block">Select Division</label>
                                <select name="district" class="form-control rounded mt-2" id="distri">
                              
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="addcategory" class="form-label d-block">Select Division</label>
                                <select name="specialist" class="form-control rounded mt-2">
                                    @foreach($specs as $row)
                                    <option value="{{ $row->spec }}">{{ $row->spec }}</option>
                                    @endforeach
                                </select>
                            </div>    
                        </div>
                        <!-- district -->
                       
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