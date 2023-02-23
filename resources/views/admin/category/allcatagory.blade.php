
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
                    <div class="d-flex justify-content-between card-header"><span>All Category</span> <span>Total Catagory: {{ count($categories)}}</span></div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">SL No</th>
                            <th scope="col" class="text-center">Category Name</th>
                            <th scope="col" class="text-center">Show on Menu</th>
                            <th scope="col" class="text-center">Menu Order</th>
                            <th scope="col" class="text-center">Created By</th>
                            <th scope="col" class="text-center">Created At</th>
                            <th scope="col" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($categories as $category)
                            <tr>
                            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                            <td class="text-center">{{ $category->category_name }}</td>
                            <td class="text-center">{{ $category->show_on_menu }}</td>
                            <td class="text-center">{{ $category->catagory_order }}</td>
                            <td class="text-center">{{ $category->user->name }}</td>
                            <td class="text-center">
                                @if($category->created_at == NULL)
                                    <span class="text-danger">No Date Set</span>
                                @else 
                                    {{ $category->created_at->diffForHumans() }}
                                @endif
                            </td>
                            <td class="text-right">
                                <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                    <li class="dropdown-item">
                                        <a href="{{ url('/category/edit/'.$category->id) }}">Edit</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{ url('/softdelete/category/'.$category->id) }}">Delete</a>
                                    </li>
                                    </ul>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mb-2 px-5">
                    <!-- {{$categories->appends(['catagory' => $categories->currentPage()])->links()}} -->
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
            <!-- Add Category -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card card-header">Add Category </div>
                    <div class="card card-body">
                        <form action="{{ route('store.category')}}" method="POST">
                            @csrf
                            <div class="my-2">
                                <label for="addcategory" class="form-label">Category Name</label>
                                @error('category_name')<p class="text-danger">{{ $message }}</p>@enderror    
                                <input type="text" name="category_name" class="form-control rounded mb-2" id="addcategory" placeholder="Category Name">
                                <label for="addcategory" class="form-label">Menu Order</label>
                                @error('catagory_order')<p class="text-danger">{{ $message }}</p>@enderror
                                <input type="text" name="catagory_order" class="form-control rounded mb-2" id="order" placeholder="Menu Order">
                                <label for="addcategory" class="form-label d-block">Show on Menu
                                <select name="show_on_menu" class="form-control rounded mt-2">
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>
                                </select>
                                </label>
                                <button type="submit" class="btn btn-primary mt-2">Add Category</button>
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
                                <th scope="col">Category Name</th>
                                <th scope="col" class="text-center">Show on Menu</th>
                                <th scope="col" class="text-center">Menu Order</th>
                                <th scope="col" class="text-center">Created By</th>
                                <th scope="col" class="text-center">Created At</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach($trachCat as $trach)
                                <tr>
                                    <td>{{ $trach->category_name }}</td>
                                    <td class="text-center">{{ $trach->show_on_menu }}</td>
                                    <td class="text-center">{{ $trach->catagory_order }}</td>
                                    <td class="text-center">{{ $trach->user->name }}</td>
                                    <td class="text-center">
                                        @if($trach->created_at == NULL)
                                            <span class="text-danger">No Date Set</span>
                                        @else 
                                            {{ $trach->created_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown show d-inline-block widget-dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                            <li class="dropdown-item">
                                                <a href="{{ url('category/restore/'.$trach->id) }}">Restore</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="{{ url('category/pdelete/'.$trach->id) }}">Permanently Delete</a>
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