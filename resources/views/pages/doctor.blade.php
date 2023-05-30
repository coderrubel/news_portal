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
            <div class="col-md-6">
                <div class="form-group">
                    <select name="district" id="district" class="form-select" onchange="getDoctor();">
                        <option value="all">Select District</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->district }}">{{ $district->district }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <select name="specialist" id="specialist" class="form-select" onchange="getSdoctor();">
                        <option value="all">Select Specialist</option>
                        @foreach($specialists as $specialist)
                            <option value="{{ $specialist->specialist }}">{{ $specialist->specialist }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>


                <div class="category-page">
                    <div class="row" id="newDoctor">
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
                                <h3 class="pt-1"><a href="{{url('/doctor_details/'.$row->slug)}}"> {{ $row->name }} </a></h3>
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
 
<x-footer/>