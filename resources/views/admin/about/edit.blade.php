@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Update About </div>
                        <div class="card card-body">
                            <form action="{{ url('about/update/'.$abouts->id) }}" method="post">
                                @csrf
                                <!-- Title -->
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Title</label>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="title" value="{{ $abouts->title }}" class="form-control rounded" id="addcategory" placeholder="Update Title">
                                </div>
                                <!--Sort Description -->
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Sort Description</label>
                                    @error('sort_desc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sort_desc"> {{ $abouts->sort_desc }} </textarea>
                                </div>
                                <!--Long Description -->
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Long Description</label>
                                    @error('long_desc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="long_desc"> {{ $abouts->long_desc }} </textarea>
                                    <button type="submit" class="btn btn-primary mt-2">Update About</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection