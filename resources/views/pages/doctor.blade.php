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
            <div class="col-lg-8 col-md-6">
                <!--  Search section -->
                <div class="search-section mb-3">
                    <form action="{{url('search-doctor')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="" class="form-select" id="division" onchange="getdDoctor();getDistrict()">
                                        <option value="all">Select Division</option>
                                        @foreach($division as $row)
                                        <option value="{{ $row->id }}">{{ $row->division }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="district" id="district" class="form-select" onchange="getDoctor();">
                                        <option value="all" selected>Select District</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                <!-- End Search section -->
                <div class="category-page">
                    <div class="row" id="newDoctor">
                        @foreach($doctors as $row)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{url('/doctor_details/'.$row->slug)}}" style="color: #212529;" onmouseover="this.style.color='#5374d3'" onmouseout="this.style.color='#212529'">
                                <div class="category-page-post-item" style="margin-bottom: 25px;border: 1px solid #5374d3;padding: 3px; border-radius: 3px;">
                                    <div class="photo d-flex mb-1" style="width: 100%;height: 125px;overflow: hidden;">
                                        <img src="{{ asset($row->photo) }}" style="object-fit: fill; width:40%; height:auto;" alt="HealthCareBD24">
                                        <div style="width:60%">
                                            <p class="details px-1" style="color: #5374d3;font-weight: 500;">{!! $row->hospital !!}</p> 
                                            <p class="details px-1" style="font-style: italic; margin-top: -10px; font-size: 0.90em;">{!! $row->designation !!}</p>
                                            <!--<p class="details px-1" style="width:60%">{!! Illuminate\Support\Str::limit(strip_tags($row->degree, 20)); !!}</p> -->
                                        </div>
                                    </div>
                                    <h3 class="text-center mb-0 p-1" style="font-size: 14px;"> {{ $row->name }} </h3>
                                    <p class="badge bg-website d-block mb-1">{{ $row->rDivision->division }}</p> 
                                    <p class="badge bg-website d-block mb-1">{{ $row->rDistrict->district }}</p> 
                                    <p class="badge bg-website d-block mb-1">{{ $row->specialist }}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <div class="col-md-12">
                            {{ $doctors->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
                <x-sidebar/>
            </div>
        </div>
    </div>
</div>
        
<x-footer/>