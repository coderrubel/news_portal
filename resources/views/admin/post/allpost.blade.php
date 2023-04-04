
@extends('admin.admin_master')
@section('admin')

<!-- Text editor -->
<script>
tinymce.init({
    selector: '#mytextarea'
});
</script>
@php
$auth = Auth::user()->id;
$rolls = DB::table('users')->select('users.type','users.id')->where('users.id', $auth)->first();
@endphp
        <!-- All Active Post Section -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card p-3">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <!-- <div class="d-flex justify-content-between card-header"><span>All Active Posts</span> @if($rolls->type == 'admin' || $rolls->type == 'mentor')<span>Total Active Posts: {{ count($post)}}</span>@endif</div> -->
                    <div class="table-responsive-sm table-responsive-md">
                        <table id="example" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th class="text-center">Catagory</th>
                                    <th class="text-center">Post Title</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Visitors</th>
                                    @if($rolls->type == 'admin' || $rolls->type == 'mentor')
                                    <th class="text-center">Status</th>
                                    @endif
                                    <th class="text-center">Create At</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($post as $row)
                                @if($row->admin_id == $auth || $rolls->type == 'admin' || $rolls->type == 'mentor')
                                <tr>
                                    <th scope="row">{{ $post->firstItem()+$loop->index }}</th>
                                    <td class="text-center">{{ $row->rCaregory->sub_category_name }}</td>
                                    <td class="text-center">{{ $row->post_title }}</td>
                                    <!-- <td>{{ $row->post_detail }}</td> -->
                                    <td class="text-center"><img src="{{ asset($row->post_photo) }}" style="height:40px; width:70px;"></td>
                                    <td class="text-center">{{ $row->user_name }}</td>
                                    <td class="text-center">@if($row->visitors == NULL) 0 @else {{ $row->visitors }} @endif</td>
                                    @if($rolls->type == 'admin' || $rolls->type == 'mentor')
                                    <td class="text-center">
                                        <div id="ss{{$row->id}}">
                                        @if($row->status == 'inactive') 
                                      <span class="btn btn-sm btn-danger" onclick="statusChange(<?php echo $row->id ?>,<?php echo '0' ?>)">Inactive</span>   
                                        @elseif($row->status == 'active')
                                       <span class="btn btn-sm btn-success" onclick="statusChange(<?php echo $row->id ?>,<?php echo '1' ?>)">Active</span>      
                                        @endif
                                        </div>
                                    </td>
                                    @endif
                                    <td class="text-center">
                                    @if($row->created_at == NULL)
                                        <span class="text-danger">No Date Set</span>
                                    @else 
                                        {{ $row->created_at->diffForHumans() }}
                                    @endif
                                    </td>
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
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        {{ $post->links() }}
                    </div>
                </div>
            </div>
        </div>


@endsection