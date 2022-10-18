@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Edit Category </div>
                        <div class="card card-body">
                            <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                @csrf
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Category Name</label>
                                    @error('category_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="category_name" value="{{ $categories->category_name }}" class="form-control rounded" id="addcategory" placeholder="Update Category Name">
                                    <input type="text" name="catagory_order" value="{{ $categories->catagory_order }}" class="form-control rounded mt-2" id="order" placeholder="Catagory Order">
                                    <select name="show_on_menu" class="form-control rounded mt-2" value="{{ $categories->show_on_menu }}">
                                        <option value="Show">Show</option>
                                        <option value="Hide">Hide</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2">Update Category</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    
