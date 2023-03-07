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
                        <div class="card card-header">Edit Post</div>
                        <div class="card card-body">
                            <form action="{{ url('post/update/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="my-2">
                                    <!-- Post Title -->
                                    <label for="addcategory" class="form-label mb-0">Post Title</label>
                                    @error('post_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="post_title" value="{{ $post->post_title }}" class="form-control rounded" placeholder="Post Title">
                                    <!-- Catagory name -->
                                    <label for="addcategory" class="form-label d-block mt-2 mb-0">Catagory Name *</label>
                                    @error('category_id')<p class="text-danger">{{ $message }}</p>@enderror    
                                    @error('sub_category_id')<p class="text-danger">{{ $message }}</p>@enderror  
                                    <select name="sub_category_id" class="form-control rounded" id="sub_category" onchange="getCategory()">
                                    <option>Select one</option>
                                    @foreach($subcagagorys as $item)
                                    <option value="{{ $item->id }}"> {{ $item->sub_category_name }} ({{ $item->rCaregory->category_name}})</option>
                                    <!-- <option value="{{ $item->id }}" @if( $post->sub_category_id == $item->id) Selected @endif > {{ $item->sub_category_name }} ({{ $item->rCaregory->category_name}})</option> -->
                                    @endforeach
                                    <input type="hidden" id="category_id" name="category_id" value="">
                                    </select>  
                                    <!-- Post Status -->
                                    @php
                                    $auth = Auth::user()->id;
                                    $rolls = DB::table('users')->select('users.type','users.id')->where('users.id', $auth)->first();
                                    @endphp
                                    @if($rolls->type == 'admin' || $rolls->type == 'mentor')
                                    <label for="addcategory" class="form-label d-block mt-2 mb-0">Post Status</label>
                                    <select name="status" class="form-control rounded" >
                                     <option value="active" @if($post->status == 'active') selected @endif>Active</option>
                                     <option value="inactive" @if($post->status == 'inactive') selected @endif>Inactive</option>
                                    </select>
                                    @endif
                                    <!-- post image -->
                                    <label for="post_photo" class="form-label d-block mt-2 mb-0">Post Image</label>
                                    @error('image')<p class="text-danger">{{ $message }}</p>@enderror    
                                    <input type="file" name="post_photo" class="form-control rounded mb-3" id="addimg">
                                    <input type="text" name="old_image" value="{{ $post->post_photo }}" class="form-control rounded mb-3" hidden>
                                    <img src="{{ asset($post->post_photo) }}" style="width:400px; height:200px;" alt="post_image"><br>
                                    <!-- Post details -->
                                    <label for="addcategory" class="form-label mt-2 mb-0">Post Details</label>
                                    @error('post_detail')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror   
                                    <textarea name="post_detail" id="mytextarea" class="form-control mt-2 mb-0" row="10">{{ $post->post_detail }}</textarea>
                                    <button type="submit" class="btn btn-primary mt-2">Update Post</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    
