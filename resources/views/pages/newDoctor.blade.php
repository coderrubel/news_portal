@if(count($doctors)>=1)


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
@else
    <div class="col-md-12">
        <h4 class="text-center">No Record Found</h4>
    </div>
@endif