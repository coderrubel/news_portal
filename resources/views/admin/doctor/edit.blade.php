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
                                    <!-- Name MBDC Gender-->
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xm-12">
                                            <label for="name" class="form-label mt-2 mb-1">Doctor Name</label>
                                                @error('name')<p class="text-danger">{{ $message }}</p>@enderror    
                                            <input type="text" name="name" value="{{ $doctor->name }}" class="form-control rounded mb-2" id="name" placeholder="Doctor Name">
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xm-12">
                                            <label for="bmdc" class="form-label mt-2 mb-1">BMDC Number</label>
                                            <input type="text" name="bmdc" value="{{ $doctor->bmdc }}" class="form-control rounded mb-2" id="bmdc" placeholder="BMDC Number">
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
                                            <label for="divis" class="form-label d-block">Select Division</label>
                                            <select name="division" class="form-control rounded mt-2" id="divis" onchange="getDivis();">
                                                @foreach($divisions as $row)
                                                <option value="{{ $row->id }}" @if($doctor->division==  $row->id) selected @endif>{{ $row->division }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xm-12">
                                            <label for="distri" class="form-label d-block">Select District</label>
                                            @php
                                            $distt= DB::table('districts')->where('id',$doctor->district)->first();
                                            @endphp
                                            <select name="district" value="{{ $doctor->district }}" class="form-control rounded mt-2" id="distri">
                                                <option value="{{$doctor->district}}" selected>{{ $distt->district}}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xm-12">
                                            <label for="spec" class="form-label d-block">Select Specialist</label>
                                            <select name="specialist" class="form-control rounded mt-2" id="spec">
                                                @foreach($specs as $row)
                                                <option value="{{ $row->spec }}" @if($doctor->specialist ==  $row->id ) selected @endif>{{ $row->spec }}</option>
                                                @endforeach
                                            </select>
                                        </div>    
                                    </div>
            
                                    <!-- degree designation hospital -->
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xm-12">
                                            <label for="degree" class="form-label mt-2 mb-1">Degree</label>
                                                @error('degree')<p class="text-danger">{{ $message }}</p>@enderror    
                                            <input type="text" name="degree" value="{{ $doctor->degree }}" class="form-control rounded mb-2" id="degree" placeholder="Degree">
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xm-12">
                                            <label for="designation" class="form-label mt-2 mb-1">Designation</label>
                                            <input type="text" name="designation" value="{{ $doctor->designation }}" class="form-control rounded mb-2" id="designation" placeholder="Designation">
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xm-12">
                                            <label for="hospital" class="form-label mt-2 mb-1">Hospital Name</label>
                                            <input type="text" name="hospital" value="{{ $doctor->hospital }}" class="form-control rounded mb-2" id="hospital" placeholder="Hospital Name">
                                        </div>
                                    </div>
            
                                    <!-- Mobile Email-->
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xm-12">
                                            <label for="mobile1" class="form-label mt-2 mb-1">Mobile Number 1</label>
                                                @error('mobile1')<p class="text-danger">{{ $message }}</p>@enderror    
                                            <input type="text" name="mobile1" value="{{ $doctor->mobile1 }}" class="form-control rounded mb-2" id="mobile1" placeholder="Mobile Number">
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xm-12">
                                            <label for="mobile2" class="form-label mt-2 mb-1">Mobile Number 2</label>
                                            <input type="text" name="mobile2" value="{{ $doctor->mobile2 }}" class="form-control rounded mb-2" id="mobile2" placeholder="Mobile Number">
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xm-12">
                                            <label for="email" class="form-label mt-2 mb-1">Email</label>
                                            <input type="email" name="email" value="{{ $doctor->email }}" class="form-control rounded mb-2" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                   
                                    <!-- Chamber -->
                                    <label class="form-label mt-2 mb-1">Chamber Details</label>
                                    @error('chamber')<p class="text-danger">{{ $message }}</p>@enderror 
                                    <textarea name="chamber" id="mytextarea" class="form-control  mb-2" row="15">{{ $doctor->chamber }}</textarea>
            
                                    <!-- Doctor Details -->
                                    <label class="form-label mt-2 mb-1">Doctor Details</label>
                                    @error('description')<p class="text-danger">{{ $message }}</p>@enderror 
                                    <textarea name="description" id="mytextarea1" class="form-control  mb-2" row="15">{{ $doctor->description }}</textarea>
            
                                    <!-- photo -->
                                    <label for="photo" class="form-label mt-2 mb-1">Doctor Photo</label>
                                    @error('photo')<p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="file" class="form-control-file form-control mb-2 p-2" id="photo" name="photo">
                                    
                                    <!-- Status -->
                                    @php
                                    $auth = Auth::user()->id;
                                    $rolls = DB::table('users')->select('users.type','users.id')->where('users.id', $auth)->first();
                                    @endphp
                                    @if($rolls->type == 'admin' || $rolls->type == 'mentor')
                                    <label for="addcategory" class="form-label d-block mt-2 mb-0">Status</label>
                                    <select name="status" class="form-control rounded" >
                                     <option value="active" @if($doctor->status == 'active') selected @endif>Active</option>
                                     <option value="inactive" @if($doctor->status == 'inactive') selected @endif>Inactive</option>
                                    </select>
                                    @endif

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
