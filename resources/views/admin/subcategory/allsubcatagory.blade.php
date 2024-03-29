@extends('admin.admin_master')
@section('admin')

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
                    <div class="d-flex justify-content-between card-header"><span>All Sub Category</span> <span>Total Sub Catagory: {{ count($subcagagorys)}} </span></div>
                    <div class="table-responsive-sm table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Category Name</th>
                                <th scope="col" class="text-center">Sub Category Name</th>
                                <th scope="col" class="text-center">Created At</th>
                                <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($subcagagorys as $row)
                                <tr>
                                <th scope="row">{{ $row->rCaregory->category_name }}</th>
                                <td class="text-center">{{ $row->sub_category_name }}</td>
                                <td class="text-center">{{ date('d-M-Y', strtotime($row->created_at)); }}</td>
                                <td class="text-right">
                                <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                    <li class="dropdown-item">
                                        <a href="{{ url('/subcategory/edit/'.$row->id) }}">Edit</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{ url('/softdelete/subcategory/'.$row->id) }}">Remove</a>
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
            </div>
            <!-- Add Category -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card card-header">Add Category </div>
                    <div class="card card-body">
                        <form action="{{ route('store.subcategory')}}" method="POST">
                            @csrf
                            <div class="my-2">

                                <label for="addcategory" class="form-label d-block">Catagory Name</label>
                                <select name="category_id" class="form-control rounded mt-2">
                                    @foreach($catagory as $row)
                                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                    @endforeach
                                </select>

                                <label for="addcategory" class="form-label">Sub Category Name*</label>
                                @error('sub_category_name')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="sub_category_name" class="form-control rounded mb-2" id="addcategory" placeholder="Sub Category Name">
                                <button type="submit" class="btn btn-primary mt-2">Add Sub Category</button>
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
                    <div class="table-responsive-sm table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Category Name</th>
                                <th scope="col" class="text-center">Sub Category Name</th>
                                <th scope="col" class="text-center">Created At</th>
                                <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trachCat as $row)
                                <tr>
                                <th scope="row">{{ $row->rCaregory->category_name }}</th>    
                                <td class="text-center">{{ $row->sub_category_name }}</td>
                                <td class="text-center">{{ date('d-M-Y', strtotime($row->created_at)); }}</td>
                                <td class="text-right">
                                    <div class="dropdown show d-inline-block widget-dropdown">
                                        <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                        <li class="dropdown-item">
                                            <a href="{{ url('subcategory/restore/'.$row->id) }}">Restore</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="{{ url('subcategory/pdelete/'.$row->id) }}">Delete</a>
                                        </li>
                                        </ul>
                                    </div>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                        <!-- {{$trachCat->appends(['trach' => $trachCat->currentPage()])->links()}} -->
                    <div class="text-center mb-2 px-5">{{ $trachCat->links() }}</div>
                </div>
            </div>
        </div>

@endsection