<x-header/>
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @php
                    $faq = DB::table('sliders')->get();
                    @endphp
                    @foreach($faq as $faq_list)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <img src="{{$faq_list->image}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5> {{ $faq_list->title }}</h5>
                            <p>{{$faq_list->description}}</p>
                        </div>
                    </div>     
                    @endforeach  
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
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