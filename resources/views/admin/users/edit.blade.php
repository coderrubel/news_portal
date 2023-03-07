@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Edit User </div>
                        <div class="card card-body">
                            <form action="{{ url('user/update/'.$users->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="my-2">
                                    
                                    <label for="addcategory" class="form-label mt-2 mb-0">User Permission</label>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror  
                                    <select name="type" class="form-control rounded mt-2" value="{{ $users->type }}">
                                        <option value="user" @if($users->type == 'user') Selected @endif >User</option>
                                        <option value="mentor" @if($users->type == 'mentor') Selected @endif >Mentor</option>
                                        <option value="admin" @if($users->type == 'admin') Selected @endif >Admin</option>
                                    </select>

                                    <button type="submit" class="btn btn-primary mt-2">Update User Permission</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    
