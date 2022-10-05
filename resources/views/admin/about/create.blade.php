@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create About</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.about')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    @error('title')<p class="text-danger">{{ $message }}</p>@enderror
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="About Title" name="title">
                </div>
                <div class="form-group">  
                    <label for="exampleFormControlTextarea1">Sort Description</label>
                    @error('sort_desc')<p class="text-danger">{{ $message }}</p>@enderror
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sort_desc"></textarea>
                </div>
                <div class="form-group">  
                    <label for="exampleFormControlTextarea1">Long Description</label>
                    @error('long_desc')<p class="text-danger">{{ $message }}</p>@enderror
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="long_desc"></textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection