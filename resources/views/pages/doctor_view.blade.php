<x-header title="{{ $doctorview->name }}"/>
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
                        <div class="col-md-2 col-sm-12 col-xm-12">
                          <img src="{{ asset($doctorview->photo) }}" class="img-fluid rounded-start" style="max-height:160px">
                        </div>
                        <div class="col-md-7 col-sm-12 col-xm-12">
                          <div class="card-body pb-0">
                            <h5 style="margin-bottom: 1px;">{!! $doctorview->name??'' !!}</h5>
                            <i>{!! $doctorview->degree??'' !!}</i>
                            <p style="font-weight: bold;margin-bottom: 1px;margin-top: 10px;">{{ $doctorview->hospital }}</p>
                            <i>{{ $doctorview->designation }}</i>
                            <p class="mt-2"><span class="badge bg-website">{!! $doctorview->rDivision->division??'' !!}</span>  <span class="badge bg-website">{!! $doctorview->rDistrict->district??'' !!}</span>  <span class="badge bg-website">{!! $doctorview->specialist??'' !!}</span></p>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xm-12">
                            <div class="card-body pb-0 text-center">
                                @isset( $doctorview->bmdc )
                                <span class="badge bg-website" style="font-size: 12px;">BMDC No: {!! $doctorview->bmdc??'' !!}</span><br>
                                @endisset
                                @isset( $doctorview->mobile1 )
                                <span>For Appointment<br>
                                    <a href="tel:{!! $doctorview->mobile1??'' !!}">{!! $doctorview->mobile1??'' !!}</a><br>
                                    <a href="tel:{!! $doctorview->mobile2??'' !!}">{!! $doctorview->mobile2??'' !!}</a>
                                </span>
                                @endisset
                                @isset( $doctorview->email )
                                <br><i>{!! $doctorview->email??'' !!}</i>
                                @endisset
                            </div>
                        </div>
                      </div>
                      <div class="row g-0 border-top">
                          <div class="card-body">
                             <p class="card-text">{!! $doctorview->chamber??'' !!}</p><hr>
                             <p class="mt-2">{!! $doctorview->description??'' !!}</p>
                             <i>Updated At {{ $doctorview->created_at->format('d M Y')??''}}</i>
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
