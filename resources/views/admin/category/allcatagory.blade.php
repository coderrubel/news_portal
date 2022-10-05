
@extends('admin.admin_master')
@section('admin')

        <!-- All Category Section -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        @if(session('success'))
                         <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="d-flex justify-content-between card-header"><span>All Category</span> <span>Total Catagory: {{ count($categories)}}</span></div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Show on Menu</th>
                                <th scope="col">Menu Order</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($categories as $category)
                                <tr>
                                <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->show_on_menu }}</td>
                                <td>{{ $category->catagory_order }}</td>
                                <td>{{ $category->user->name }}</td>
                                <td>
                                    @if($category->created_at == NULL)
                                        <span class="text-danger">No Date Set</span>
                                    @else 
                                        {{ $category->created_at->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/category/edit/'.$category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ url('/softdelete/category/'.$category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center mb-2 px-5">{{$categories->links()}}</div>
                    </div>
                </div>
                <!-- Add Category -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card card-header">Add Category </div>
                        <div class="card card-body">
                            <form action="{{ route('store.category')}}" method="POST">
                                @csrf
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Category Name</label>
                                    @error('category_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="category_name" class="form-control rounded" id="addcategory" placeholder="Category Name">
                                    <input type="text" name="catagory_order" class="form-control rounded mt-2" id="order" placeholder="Catagory Order">
                                    <select name="show_on_menu" class="mt-2">
                                        <option value="Show">Show</option>
                                        <option value="Hide">Hide</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2">Add Category</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SoftDelete Section -->
        <div class="container">
            <div class="row justify-content-start mt-4">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card card-header">Trasht  Category</div>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Show on Menu</th>
                                    <th scope="col">Menu Order</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach($trachCat as $trach)
                                    <tr>
                                    <td>{{ $categories->firstItem()+$loop->index }}</td>
                                    <td>{{ $trach->category_name }}</td>
                                    <td>{{ $trach->show_on_menu }}</td>
                                    <td>{{ $trach->catagory_order }}</td>
                                    <td>{{ $trach->user->name }}</td>
                                    <td>
                                        @if($trach->created_at == NULL)
                                            <span class="text-danger">No Date Set</span>
                                        @else 
                                            {{ $trach->created_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('category/restore/'.$trach->id) }}" class="btn btn-sm btn-info">Restore</a>
                                        <a href="{{ url('category/pdelete/'.$trach->id) }}" class="btn btn-sm btn-danger">Permanently Delete</a>
                                    </td>
                                    </tr>
                                    @endforeach

                                    
                                </tbody>
                            </table>
                        <div class="text-center mb-2 px-5">{{ $trachCat->links() }}</div>
                    </div>
                </div>
            </div>
        </div>



@endsection