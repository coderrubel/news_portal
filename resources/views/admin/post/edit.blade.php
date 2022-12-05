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
                                    <label for="addcategory" class="form-label d-block mt-2 mb-0">Catagory Name</label>
                                    <select name="sub_category_id" class="form-control rounded">
                                    @foreach($subcagagorys as $item)
                                     <option value="{{ $item->id }}" @if( $post->sub_category_id == $item->id) Selected @endif >{{ $item->sub_category_name }} ({{ $item->rCaregory->category_name}})</option>
                                    @endforeach
                                    </select>  
                                    <!-- Post Visitors -->
                                    <!-- <label for="addcategory" class="form-label d-block mt-2 mb-0">Post View Show</label>
                                    <select name="visitors" class="form-control rounded">
                                     <option value="1" @if($post->visitors == 1) selected @endif>Yes</option>
                                     <option value="0" @if($post->visitors == 0) selected @endif>No</option>
                                    </select> -->
                                    <label for="addcategory" class="form-label d-block mt-2 mb-0">Post Share</label>
                                    <select name="is_share" class="form-control rounded" >
                                     <option value="1" @if($post->is_share == 1) selected @endif>Yes</option>
                                     <option value="0" @if($post->is_share == 0) selected @endif>No</option>
                                    </select>
                                    <label for="addcategory" class="form-label d-block mt-2 mb-0">Post Comment Show</label>
                                    <select name="is_comment" class="form-control rounded">
                                     <option value="1" @if($post->is_comment == 1) selected @endif>Yes</option>
                                     <option value="0" @if($post->is_comment == 0) selected @endif>No</option>
                                     </select>
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
