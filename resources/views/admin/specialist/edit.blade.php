@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Edit Specialist</div>
                        <div class="card card-body">
                            <form action="{{ url('/specialist/update/'.$specs->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="my-2"> 
                                    <label for="addcategory" class="form-label mt-2 mb-0">Update Specialist</label>
                                    @error('spec')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="spec" value="{{ $specs->spec }}" class="form-control rounded" id="addcategory" placeholder="Update Specialist">
                        
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
