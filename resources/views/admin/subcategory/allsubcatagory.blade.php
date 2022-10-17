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
                    <div class="d-flex justify-content-between card-header"><span>All Category</span> <span>Total Catagory: </span></div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Category ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Show on Menu</th>
                            <th scope="col">Menu Order</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($subcagagorys as $row)
                            <tr>
                            <td>{{ $row->category_id }}</td>
                            <td>{{ $row->sub_category_name }}</td>
                            <td>{{ $row->show_on_menu }}</td>
                            <td>{{ $row->sub_catagory_order }}</td>
                            <td>
                                <a href="{{ url('/category/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ url('/softdelete/category/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mb-2 px-5">
 
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
                                <label for="addcategory" class="form-label">Category ID</label>
                                @error('category_id')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="category_id" class="form-control rounded mb-2" id="addcategory" placeholder="Category ID">
                                <label for="addcategory" class="form-label">Sub Category Name</label>
                                @error('sub_category_name')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="sub_category_name" class="form-control rounded mb-2" id="addcategory" placeholder="Sub Category Name">
                                <label for="addcategory" class="form-label">Sub Category Order</label>
                                @error('sub_catagory_order')<p class="text-danger">{{ $message }}</p>@enderror
                                <input type="text" name="sub_catagory_order" claSss="form-control rounded mb-2" id="order" placeholder="Sub Catagory Order">
                                <label for="addcategory" class="form-label d-block">Show on Menu
                                <select name="show_on_menu" class="form-control rounded mt-2">
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>
                                </select>
                                </label>
                                <button type="submit" class="btn btn-primary mt-2">Add Sub Category</button>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
        
                <!-- SoftDelete Section -->
                


@endsection