@if(count($doctors)>=1)
    @foreach($doctors as $row)
        <div class="col-lg-4 col-md-6">
            <a href="{{url('/doctor_details/'.$row->slug)}}" style="color: #212529;" onmouseover="this.style.color='#5374d3'" onmouseout="this.style.color='#212529'">
                <div class="category-page-post-item" style="margin-bottom: 25px;border: 1px solid #5374d3;padding: 3px; border-radius: 3px;">
                    <div class="photo d-flex mb-1" style="width: 100%;height: 125px;overflow: hidden;">
                        <img src="{{ asset($row->photo) }}" style="object-fit: fill; width:40%; height:auto;" alt="HealthCareBD24">
                        <div style="width:60%">
                            <p class="details px-1" style="color: #5374d3;font-weight: 500;">{!! $row->hospital !!}</p> 
                            <p class="details px-1" style="font-style: italic; margin-top: -10px;font-size: 0.90em;">{!! $row->designation !!}</p>
                            <!--<p class="details px-1" style="width:60%">{!! Illuminate\Support\Str::limit(strip_tags($row->degree, 20)); !!}</p> -->
                        </div>
                    </div>
                    <h3 class="text-center mb-0 p-1" style="font-size: 15px;"> {{ $row->name }} </h3>
                    <p class="badge bg-website d-block mb-1">{{ $row->rDivision->division }}</p> 
                    <p class="badge bg-website d-block mb-1">{{ $row->rDistrict->district }}</p> 
                    <p class="badge bg-website d-block mb-1">{{ $row->specialist }}</p>
                </div>
            </a>
        </div>
    @endforeach
@else
    <div class="col-md-12">
        <h4 class="text-center">No Record Found</h4>
    </div>
@endif