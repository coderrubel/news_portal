
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
    <!-- SoftDelete Section -->
    <div class="row justify-content-start mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card card-header">Remove Posts</div>
                <div class="table-responsive-sm table-responsive-md m-3">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Post ID</th>
                                <th class="text-center">Catagory</th>
                                <th class="text-center">Post Title</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Create At</th>
                                <th scope="col" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trachPost as $row)
                            @if($row->admin_id == $auth || $rolls->type == 'admin' || $rolls->type == 'mentor')
                            <tr>
                                <th scope="row">{{ $row->id }}</th>
                                <td class="text-center">{{ $row->rCaregory->sub_category_name }}</td>
                                <td class="text-center">{{ $row->post_title }}</td>
                                <td class="text-center"><img src="{{ asset($row->post_photo) }}" style="height:40px; width:70px;"></td>
                                <td class="text-center">{{ $row->user_name }}</td>
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
                                            <a href="{{ url('post/restore/'.$row->id) }}">Restore</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="{{ url('/post/pdelete/'.$row->id) }}">Delete</a>
                                        </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
@endsection