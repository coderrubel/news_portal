<x-header/>
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>About</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/');}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <h3>{{ $abouts->title??'' }}</h3>
                        <p>{{ $abouts->sort_desc??'' }}</p>
                        <p>{{ $abouts->long_desc??'' }}</p>
                        @if($abouts->created_at == NULL)
                        <span class="text-danger">No Date Set</span>
                        @else 
                            {{ $abouts->created_at->diffForHumans() }}
                        @endif
                        <!-- <p><i>Updated Date: {{$abouts->updated_at??''}}</i></p> -->
                    </div>
                </div>
            </div>
        </div>
<x-footer/>