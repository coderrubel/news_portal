@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Update Contact </div>
                        <div class="card card-body">
                            <form action="{{ url('contact/update/'.$contacts->id) }}" method="post">
                                @csrf
                                <!-- Number -->
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Phone Number</label>
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="phone" value="{{ $contacts->phone }}" class="form-control rounded" id="addcategory" placeholder="Update Number">
                                </div>
                                <!-- Email -->
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Phone Number</label>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <input type="text" name="email" value="{{ $contacts->email }}" class="form-control rounded" id="addcategory" placeholder="Update Email Address">
                                </div>
                                <!-- Address -->
                                <div class="my-2">
                                    <label for="addcategory" class="form-label">Update Address</label>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"> {{ $contacts->address }} </textarea>
                                    <button type="submit" class="btn btn-primary mt-2">Update Contact</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection