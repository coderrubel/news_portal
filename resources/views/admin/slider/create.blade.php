@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create FAQ</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.slider')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">FAQ Title</label>
                    @error('title')<p class="text-danger">{{ $message }}</p>@enderror
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Slider Title" name="title">
                </div>
                
                <div class="form-group">  
                    <label for="exampleFormControlTextarea1">Description</label>
                    @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">FAQ Image</label>
                    @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection