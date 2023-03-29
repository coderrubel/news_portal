<x-header/>
    <div class="page-content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex flex-column justify-content-center align-items-center align-self-center">
                        <h3>@yield('code')</h3>
                        <p>@yield('message')</p>
                    </div>
                </div>  
                <div class="col-lg-4 col-md-6 sidebar-col">
                    <x-sidebar/>
                </div>
            </div>
        </div>
    </div>
<x-footer/>
