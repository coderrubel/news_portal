<x-header/>
        
        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Login</h2>
                        <nav class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="page-content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf  
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <div class="d-flex my-2 justify-content-between">
                                    <div class="d-inline-block mr-3">
                                        <label class="control control-checkbox">
                                        <input type="checkbox" name="remember"/> Remember me
                                        <div class="control-indicator"></div>
                                        </label>
                                
                                    </div>
                                    <p><a class="text-blue" href="{{ route('password.request') }} ">Forgot Your Password?</a></p>
                                </div>
                            <div class="mb-3">
                                <div class="d-flex my-2 justify-content-between">
                                <button type="submit" class="btn btn-primary bg-website">Login</button>
                                    <p>Don't have an account yet ?
                                        <a class="text-blue" href="{{route('register')}}">Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>

<x-footer/>