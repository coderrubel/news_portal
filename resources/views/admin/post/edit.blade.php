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
                                    <label for="addcategory" class="form-label d-block">Catagory Name</label>
                                    <select name="sub_category_id" class="form-control rounded mt-2">
                                    @foreach($subcagagorys as $item)
                                     <option value="{{ $item->id }}" @if( $post->sub_category_id == $item->id) Selected @endif >{{ $item->sub_category_name }} ({{ $item->rCaregory->category_name}})</option>
                                    @endforeach
                                    </select>  
                                   
                                    <label for="addcategory" class="form-label mt-2 mb-0">Post Title</label>
                                    @error('post_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="post_title" value="{{ $post->post_title }}" class="form-control rounded" placeholder="Post Title">
                                   
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
