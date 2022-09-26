<x-header/>
        
        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Reset Password</h2>
                        <nav class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
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
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="mb-3">
                <label for="email" class="form-label" value="{{ __('Email') }}">Email Address</label>
                <input type="email" name="email" class="form-control" :value="old('email', $request->email)" required autofocus>
            </div>
            <div class="mb-3">
                <label for="" class="form-label" value="{{ __('Password')">Password</label>
                <input type="password" name="password" class="form-control" required autocomplete="new-password">
            </div>
            <div class="mb-3">
                <label for="" class="form-label" value="{{ __('Password')">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary bg-website">Reset  password</button>
            </div>
        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   <x-footer/>