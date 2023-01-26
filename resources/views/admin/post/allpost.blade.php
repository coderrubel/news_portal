
@extends('admin.admin_master')
@section('admin')

<!-- Text editor -->
<script>
tinymce.init({
    selector: '#mytextarea11'
});
</script>
        <!-- All Category Section -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between card-header"><span>All Post</span> <span>Total Post: {{ count($post)}}</span></div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Catagory</th>
                                <th scope="col">Post Title</th>
                                <th scope="col">Post Image</th>
                                <th scope="col">Author</th>
                                <!-- <th scope="col">Post Details</th> -->
                                <th scope="col">Visitors</th>
                                <!-- <th scope="col">Share</th> -->
                                <!-- <th scope="col">Comment</th> -->
                                <th scope="col">Create At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $row)
                            <tr>
                                <th scope="row">{{ $post->firstItem()+$loop->index }}</th>
                                <td>{{ $row->rCaregory->sub_category_name }}</td>
                                <td>{{ $row->post_title }}</td>
                                <!-- <td>{{ $row->post_detail }}</td> -->
                                <td><img src="{{ asset($row->post_photo) }}" style="height:40px; width:70px;"></td>
                                <td>{{ $row->user_name }}</td>
                                <td>@if($row->visitors == NULL) 0 @else {{ $row->visitors }} @endif</td>
                                <td>
                                @if($row->created_at == NULL)
                                    <span class="text-danger">No Date Set</span>
                                @else 
                                    {{ $row->created_at->diffForHumans() }}
                                @endif
                                </td>
                                <!-- <td>@if($row->is_share == 1) Yes @else No @endif</td> -->
                                <!-- <td> @if($row->is_comment == 1) Yes @else No @endif</td> -->
                                <td class="text-right">
                                    <div class="dropdown show d-inline-block widget-dropdown">
                                        <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                        <li class="dropdown-item">
                                            <a href="{{ url('post/edit/'.$row->id) }}">Edit</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="{{ url('softdelete/post/'.$row->id) }}">Remove</a>
                                        </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Add Category -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card card-header">Add Post </div>
                    <div class="card card-body">
                        <form action="{{ route('store.post')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="my-2">
                                <!-- Sub catagory id -->
                                <label for="addcategory" class="form-label d-block">Select Catagory</label>
                                @error('sub_category_id')<p class="text-danger">{{ $message }}</p>@enderror  
                                <select name="sub_category_id" class="form-control rounded mt-2" id="sub_category" onchange="getCategory()">
                                    @foreach($subcagagorys as $item)
                                    <option value="{{ $item->id }}">{{ $item->sub_category_name }} ({{ $item->rCaregory->category_name}} {{ $item->rCaregory->id }})</option>
                                    @endforeach
                                    <input type="hidden" id="category_id" name="category_id" value="">
                                </select> 
                                
                                <!-- Post title -->
                                <label for="post" class="form-label mt-2 mb-1">Post Title</label>
                                @error('post_title')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="post_title" class="form-control rounded mb-2" id="post" placeholder="Post Title">
                                 <!-- post deltils -->
                                <label for="postdetaile" class="form-label">Post Details</label>
                                @error('post_detail')<p class="text-danger">{{ $message }}</p>@enderror    
                                <textarea name="post_detail" id="mytextarea" class="form-control  mb-2" row="15"></textarea>
                                <!-- post image -->
                                <label for="post_photo" class="form-label">Post Image</label>
                                @error('image')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="file" class="form-control-file form-control mb-2 p-2" id="post_photo" name="post_photo">
                                 <!-- visitors -->
                                <!-- <label for="addcategory" class="form-label d-block">Post Visitors Show</label>
                                <select name="visitors" class="form-control rounded mt-2">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select> -->
                                <!-- Share -->
                                <label for="addcategory" class="form-label d-block">Post Share Show</label>
                                <select name="is_share" class="form-control rounded mt-2">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <!-- comment -->
                                <label for="addcategory" class="form-label d-block">Post Comment Show</label>
                                <select name="is_comment" class="form-control rounded mt-2">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <!-- Tags -->
                                <!-- <label for="postdetaile" class="form-label">Post Tags</label>
                                @error('post_tag')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="post_tags" class="form-control rounded mb-2" id="postdetails" placeholder="Post Tags"> -->
                                
                                
                                <button type="submit" class="btn btn-primary mt-2">Add Post</button>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
        
       
        <!-- SoftDelete Section -->
        <div class="row justify-content-start mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card card-header">Trasht  Category</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Catagory</th>
                                    <th scope="col">Post Title</th>
                                    <th scope="col">Author</th>
                                    <!-- <th scope="col">Post Details</th> -->
                                    <th scope="col">Visitors</th>
                                    <!-- <th scope="col">Share</th> -->
                                    <!-- <th scope="col">Comment</th> -->
                                    <th scope="col">Create At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trachCat as $row)
                                <tr>
                                    <th scope="row">{{ $post->firstItem()+$loop->index }}</th>
                                    <td>{{ $row->rCaregory->sub_category_name }}</td>
                                    <td>{{ $row->post_title }}</td>
                                    <td>{{ $row->user_name }}</td>
                                    <td>{{ $row->visitors }}</td>
                                    <td>
                                    @if($row->created_at == NULL)
                                        <span class="text-danger">No Date Set</span>
                                    @else 
                                        {{ $row->created_at->diffForHumans() }}
                                    @endif
                                    </td>
                                    <!-- <td>{{ $row->is_share }}</td> -->
                                    <!-- <td>{{ $row->is_comment }}</td> -->
                                    <td class="text-right">
                                        <div class="dropdown show d-inline-block widget-dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                            <li class="dropdown-item">
                                                <a href="{{ url('post/restore/'.$row->id) }}">Restore</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="{{ url('/post/pdelete/'.$row->id) }}">Delete</a>
                                            </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- {{$trachCat->appends(['trach' => $trachCat->currentPage()])->links()}} -->
                    <div class="text-center mb-2 px-5">{{ $trachCat->links() }}</div>
                </div>
            </div>
        </div>

@endsection