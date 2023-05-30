@extends('admin.admin_master')
@section('admin')
    
   
        <!-- All Category Section -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                   <a href="{{ route('add.contact')}}" class="btn btn-md btn-primary mb-4">Add Contact</a>
                    <div class="card">
                        @if(session('success'))
                         <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card card-header">About</div>
                        <table class="table table-responsive-sm table-responsive-md">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:5%">SL</th>
                                    <th scope="col" style="width:10%">Phone Number</th>
                                    <th scope="col" style="width:25%">Email</th>
                                    <th scope="col" style="width:35%; text-align:center">Address</th>
                                    <th scope="col" style="width:15%; text-align:center">Date</th>
                                    <th scope="col" style="width:10%; text-align:right">Action</th>
                                </tr>
                                @php($i=1)
                                @foreach($contacts as $contact)
                                <tr>
                                    <td style="width:5%;">{{$i++}}</td>
                                    <td style="width:10%;">{{$contact->phone }}</td>
                                    <td style="width:25%;">{{$contact->email }}</td>
                                    <td style="width:35%; text-align:center">{{$contact->address }}</td>
                                    <td style="width:15%; text-align:center">
                                        @if($contact->created_at == NULL)
                                            <span class="text-danger">No Date Set</span>
                                        @else 
                                            {{ $contact->created_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td style="width:10%; text-align:right">
                                        <a href="{{ url('/contact/edit/'.$contact->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ url('/contact/delete/'.$contact->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection
