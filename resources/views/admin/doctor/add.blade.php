@extends('admin.admin_master')
@section('admin')
<script>
tinymce.init({
    selector: '#mytextarea'
});
tinymce.init({
    selector: '#mytextarea1'
});
</script>
@php
$auth = Auth::user()->id;
$rolls = DB::table('users')->select('users.type','users.id')->where('users.id', $auth)->first();
@endphp
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card card-header">Add Doctor </div>
            <div class="card card-body">
                <form action="{{ route('add.doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-2">
                        <!-- Name MBDC Gender-->
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xm-12">
                                <label for="name" class="form-label mt-2 mb-1">Doctor Name *</label>
                                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="name" class="form-control rounded mb-2" id="name" placeholder="Doctor Name">
                            </div>
                            <div class="col-md-4 col-sm-6 col-xm-12">
                                <label for="bmdc" class="form-label mt-2 mb-1">BMDC Number</label>
                                <input type="text" name="bmdc" class="form-control rounded mb-2" id="bmdc" placeholder="BMDC Number">
                            </div>
                            <div class="col-md-4 col-sm-6 col-xm-12">
                                <label class="form-label d-block">Select Gender</label>
                                <select name="gender" class="form-control rounded mt-2">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                             </div>
                        </div>

                        <!-- division district specialist -->
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xm-12">
                                <label for="divis" class="form-label d-block">Select Division *</label>
                                <select name="division" class="form-control rounded mt-2" id="divis" onchange="getDivis();">
                                    <option>Select Division</option>
                                    @foreach($divisions as $row)
                                    <option value="{{ $row->id }}">{{ $row->division }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xm-12">
                                <label for="distri" class="form-label d-block">Select District *</label>
                                <select name="district" class="form-control rounded mt-2" id="distri">
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xm-12">
                                <label for="spec" class="form-label d-block">Select Specialist *</label>
                                <select name="specialist" class="form-control rounded mt-2" id="spec">
                                    @foreach($specs as $row)
                                    <option value="{{ $row->spec }}">{{ $row->spec }}</option>
                                    @endforeach
                                </select>
                            </div>    
                        </div>

                        <!-- degree designation hospital -->
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xm-12">
                                <label for="degree" class="form-label mt-2 mb-1">Degree *</label>
                                    @error('degree')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="degree" class="form-control rounded mb-2" id="degree" placeholder="Degree">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xm-12">
                                <label for="designation" class="form-label mt-2 mb-1">Designation *</label>
                                <input type="text" name="designation" class="form-control rounded mb-2" id="designation" placeholder="Designation">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xm-12">
                                @error('hospital')<p class="text-danger">{{ $message }}</p>@enderror 
                                <label for="hospital" class="form-label mt-2 mb-1">Hospital Name *</label>
                                <input type="text" name="hospital" class="form-control rounded mb-2" id="hospital" placeholder="Hospital Name">
                            </div>
                        </div>

                        <!-- Mobile Email-->
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xm-12">
                                <label for="mobile1" class="form-label mt-2 mb-1">Mobile Number 1 *</label>
                                    @error('mobile1')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="mobile1" class="form-control rounded mb-2" id="mobile1" placeholder="Mobile Number">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xm-12">
                                <label for="mobile2" class="form-label mt-2 mb-1">Mobile Number 2</label>
                                <input type="text" name="mobile2" class="form-control rounded mb-2" id="mobile2" placeholder="Mobile Number">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xm-12">
                                <label for="email" class="form-label mt-2 mb-1">Email</label>
                                <input type="text" name="email" class="form-control rounded mb-2" id="email" placeholder="Email">
                            </div>
                        </div>
                       
                        <!-- Chamber -->
                        <label class="form-label mt-2 mb-1">Chamber Details *</label>
                        @error('chamber')<p class="text-danger">{{ $message }}</p>@enderror 
                        <textarea name="chamber" id="mytextarea" class="form-control  mb-2" row="15"></textarea>

                        <!-- Doctor Details -->
                        <label class="form-label mt-2 mb-1">Doctor Details</label>
                        @error('description')<p class="text-danger">{{ $message }}</p>@enderror 
                        <textarea name="description" id="mytextarea1" class="form-control  mb-2" row="15"></textarea>

                        <!-- photo -->
                        <label for="photo" class="form-label mt-2 mb-1">Doctor Photo *</label>
                        @error('photo')<p class="text-danger">{{ $message }}</p>@enderror    
                        <input type="file" class="form-control-file form-control mb-2 p-2" id="photo" name="photo">

                        <!-- status -->
                        @if($rolls->type == 'admin' || $rolls->type == 'mentor')
                        <label class="form-label d-block">Status</label>
                        <select name="status" class="form-control rounded mt-2">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @else($rolls->type == 'user')
                        <select name="status" class="form-control rounded mt-2" hidden>
                            <option value="inactive">Inactive</option>
                        </select>
                        @endif

                        <button type="submit" class="btn btn-primary mt-2">Add Doctor</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>
@endsection