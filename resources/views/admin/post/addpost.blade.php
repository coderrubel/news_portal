@extends('admin.admin_master')
@section('admin')
<script>
tinymce.init({
    selector: '#mytextarea'
});
</script>
@php
$auth = Auth::user()->id;
$rolls = DB::table('users')->select('users.type','users.id')->where('users.id', $auth)->first();
@endphp
<!-- Add Category -->
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card card-header">Add Post </div>
            <div class="card card-body">
                <form action="{{ route('store.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-2">
                        <!-- Sub catagory id -->
                        <label for="addcategory" class="form-label d-block">Select Catagory *</label>
                        @error('category_id')<p class="text-danger">{{ $message }}</p>@enderror    
                        @error('sub_category_id')<p class="text-danger">{{ $message }}</p>@enderror  
                        <select name="sub_category_id" class="form-control rounded mt-2" id="sub_category" onchange="getCategory()">
                            <option>Select one</option>
                            @foreach($subcagagorys as $item)
                            <option value="{{ $item->id }}">{{ $item->sub_category_name }} ({{ $item->rCaregory->category_name}})</option>
                            @endforeach
                            <input type="hidden" id="category_id" name="category_id" value="">
                        </select> 
                        
                        <!-- Post title -->
                        <label for="post" class="form-label mt-2 mb-1">Post Title *</label>
                        @error('post_title')<p class="text-danger">{{ $message }}</p>@enderror    
                        <input type="text" name="post_title" class="form-control rounded mb-2" id="post" placeholder="Post Title">
                            <!-- post deltils -->
                        <label for="postdetaile" class="form-label mt-2 mb-1">Post Details *</label>
                        @error('post_detail')<p class="text-danger">{{ $message }}</p>@enderror 
                        <textarea name="post_detail" id="mytextarea" class="form-control  mb-2" row="15"></textarea>
                        <!-- post image -->
                        <label for="post_photo" class="form-label mt-2 mb-1">Post Image *</label>
                        @error('image')<p class="text-danger">{{ $message }}</p>@enderror    
                        <input type="file" class="form-control-file form-control mb-2 p-2" id="post_photo" name="post_photo">
                        <!-- Post status -->
                        @if($rolls->type == 'admin' || $rolls->type == 'mentor')
                        <label class="form-label d-block">Post Status</label>
                        <select name="status" class="form-control rounded mt-2">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @else($rolls->type == 'user')
                        <select name="status" class="form-control rounded mt-2" hidden>
                            <option value="inactive">Inactive</option>
                        </select>
                        @endif
                        <button type="submit" class="btn btn-primary mt-2">Add Post</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>
@endsection