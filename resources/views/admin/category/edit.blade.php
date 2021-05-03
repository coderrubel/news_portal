<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
           <div class="bg-success p-1 rounded text-white"> Edit Category</div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card card-header">Add Category </div>
                        <div class="card card-body">
                            <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                @csrf
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Category Name</label>
                                    @error('category_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="category_name" value="{{ $categories->category_name }}" class="form-control rounded" id="addcategory" placeholder="Update Category Name">
                                    <button type="submit" class="btn btn-primary mt-2">Update Category</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
