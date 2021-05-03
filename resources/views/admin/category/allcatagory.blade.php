<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
           <div class="bg-success p-1 rounded text-white"> All Category</div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                         <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card card-header">All Category</div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($categories as $category)
                                <tr>
                                <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->user->name }}</td>
                                <td>
                                    @if($category->created_at == NULL)
                                        <span class="text-danger">No Date Set</span>
                                    @else 
                                        {{ $category->created_at->diffForHumans() }}
                                    @endif
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center mb-2 px-5">{{$categories->links()}}</div>
                    </div>
                </div>
                <div class="col-md-4">
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
                                    <button type="submit" class="btn btn-primary mt-2">Add Category</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
