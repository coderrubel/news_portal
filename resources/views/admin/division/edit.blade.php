@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Edit Division </div>
                        <div class="card card-body">
                            <form action="{{ url('division/update/'.$divisions->id) }}" method="POST">
                                @csrf
                                <div class="my-2">
                                    <label for="adddivision" class="form-label">Update Division</label>
                                    <input type="text" name="division" value="{{ $divisions->division }}" class="form-control rounded" id="adddivision" placeholder="Update Division">

                                    <button type="submit" class="btn btn-primary mt-2">Update Division</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    
