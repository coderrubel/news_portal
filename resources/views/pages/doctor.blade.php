<x-header/>
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>SPECIALIST DOCTORS LIST</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/');}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Doctor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!--  Search section -->
                <div class="search-section mb-3">
                    <form action="{{url('search-doctor')}}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <select name="district" id="district" class="form-select">
                                    <option value="">Select District</option>
                                    @foreach($districts as $district)
                                    <option  value="">{{ $district->district }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <select name="specialist"  id="specialist" class="form-select">
                                    <option value="">Select Specialist</option>
                                    @foreach($specialists as $specialist)
                                    <option  value="">{{ $specialist->specialist }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <button type="submit" class="btn btn-secondary">Filter</button> 
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="category-page">
                    <div class="row">
                        @foreach($doctors as $row)
                        <div class="col-lg-2 col-md-4">
                            <div class="category-page-post-item">
                                <div class="photo">
                                    <img src="{{ asset($row->photo) }}" alt="HealthCareBD24">
                                </div>
                                <div class="category d-flex justify-content-between">
                                    <span class="badge bg-success">{{ $row->district }}</span> 
                                    <span class="badge bg-success">{{ $row->specialist }}</span>
                                </div>
                                <h3 class="pt-1"><a href="{{url('/doctor_details/'.$row->id)}}"> {{ $row->name }} </a></h3>
                                <div class="date-user">
                                    <div class="date">Updated Date
                                        @if($row->updated_at == NULL)
                                            {{ $row->created_at->diffForHumans() }}
                                        @else 
                                            {{ $row->updated_at->diffForHumans() }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12">
                            {{ $doctors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<!--  
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 left-col">
                <div class="card p-3">
                    <div class="table-responsive-sm table-responsive-md table-responsive">
                        <table id="example" class="table table-hover pt-2">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Specialist</th>
                                    <th class="text-center">District</th>
                                    <th class="text-center">Photo</th>
                                    <th class="text-center">Updated</th>
                                    <th class="text-center">Chamber</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctors as $key => $row)
                                <tr>
                                    <td class="text-center">{{ $row->name }}</td>
                                    <td class="text-center">{{ $row->specialist }}</td>
                                    <td class="text-center">{{ $row->district }}</td>
                                    <td class="text-center"><img src="{{ asset($row->photo) }}" style="height:40px; width:70px;"></td>
                                    <td class="text-center">
                                        @if($row->updated_at == NULL)
                                            {{ $row->created_at->diffForHumans() }}
                                        @else 
                                            {{ $row->updated_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td class="text-center"><button data-bs-toggle="modal" data-bs-target="#exampleModal{{$key}}" class="btn btn-sm btn-primary">View</button> </td>
                                        
                                        
                                        <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $row->name??'' }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">{!! $row->chamber??'' !!}</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
                <x-sidebar/>
            </div>
        </div>
    </div>
</div>
-->
<x-footer/>