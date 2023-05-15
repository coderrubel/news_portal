<x-header/>
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/');}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <a href="{{url('/doctor_list');}}">Doctor List / </a>{{ $doctorview->name??'' }}</li>
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
                    <div class="card mb-3">
                      <div class="row g-0">
                        <div class="col-md-2">
                          <img src="{{ asset($doctorview->photo) }}" class="img-fluid rounded-start" style="max-height:160px">
                        </div>
                        <div class="col-md-10">
                          <div class="card-body">
                            <h5 class="card-title">{!! $doctorview->name??'' !!}</h5>
                            <p class="card-text">{!! $doctorview->specialist??'' !!}</p>
                            <p class="card-text"><span class="badge bg-success">{!! $doctorview->district??'' !!}</span></p>
                            @if($doctorview->updated_at == NULL)
                            <p class="card-text"><small class="text-body-secondary">Last updated {{ $doctorview->created_at->format('d M Y')??''}}</small></p>
                            @else
                            <p class="card-text"><small class="text-body-secondary">Last updated {{ $doctorview->updated_at->format('d M Y')??''}}</small></p>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row g-0 border-top">
                          <div class="card-body">
                             <p class="card-text">{!! $doctorview->chamber??'' !!}</p>
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
