@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Edit Sub Category </div>
                        <div class="card card-body">
                            <form action="{{ url('subcategory/update/'.$subcagagorys->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="my-2">
                                    <label for="category" class="form-label mb-1">Update Category ID</label>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="category_id" value="{{ $subcagagorys->category_id }}" class="form-control rounded" id="addcategory" placeholder="Update Sub Category Name">
                                    <label for="addcategory" class="form-label mt-2 mb-0">Update Category Name</label>
                                    @error('sub_category_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="sub_category_name" value="{{ $subcagagorys->sub_category_name }}" class="form-control rounded" id="addcategory" placeholder="Update Sub Category Name">
                                    <label for="addcategory" class="form-label mt-2 mb-0">Update Category Order</label>
                                    @error('sub_catagory_order')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror   
                                    <input type="text" name="sub_catagory_order" value="{{ $subcagagorys->sub_catagory_order }}" class="form-control rounded mt-2" id="order" placeholder="Sub Catagory Order">
                                    <label for="addcategory" class="form-label mt-2 mb-0">Menu Show</label>
                                    @error('show_on_menu')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror  
                                    <select name="show_on_menu" class="form-control rounded mt-2" value="{{ $subcagagorys->show_on_menu }}">
                                        <option value="Show">Show</option>
                                        <option value="Hide">Hide</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2">Update Sub Category</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    
