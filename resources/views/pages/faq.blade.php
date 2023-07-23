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
               
            </div>
        </div>
    </div>
</div>
<x-footer/>
