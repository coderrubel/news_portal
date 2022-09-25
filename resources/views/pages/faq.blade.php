<x-header/>
@php
$faq = DB::table('sliders')->get();
@endphp
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Frequently Asked Questions</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/');}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="accordionExample">
                        @foreach($faq as $key => $faq_list) 
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$key}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                            {{ $faq_list->title }}
                        </button>
                        </h2>
                        <div id="collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>{{$faq_list->description}}</p>
                                <img src="{{$faq_list->image}}" style="width: 550px; height: 300px;">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer/>
