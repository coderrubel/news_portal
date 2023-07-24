@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Edit District</div>
                        <div class="card card-body">
                            <form action="{{ url('district/update/'.$districts->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="my-2">
                                    <label for="addcategory" class="form-label d-block">Division Name</label>
                                    <select name="division_id" class="form-control rounded mt-2">
                                        @foreach($divisions as $row)
                                        <option value="{{ $row->id }}" @if( $districts->id == $row->id) Selected @endif >{{ $row->division }}</option>
                                        @endforeach
                                    </select>    
                                    <label for="addcategory" class="form-label mt-2 mb-0">Update District Name</label>
                                    @error('district')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="district" value="{{ $districts->district }}" class="form-control rounded" id="addcategory" placeholder="Update District Name">
                        
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
