<x-header/>
        
        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Sign Up</h2>
                        <nav class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
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

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                <input type="name" name="name" class="form-control" required autofocus autocomplete="name" >
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                <input type="password" name="password" class="form-control" required autofocus autocomplete="new-password" >
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                @error('password_confirmation')<p class="text-danger">{{ $message }}</p>@enderror
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autofocus autocomplete="new-password" >
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-3">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                
                
                <div class="mb-3">
                    <div class="d-flex my-2 justify-content-between">
                        <button type="submit" class="btn btn-primary bg-website">Register</button>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    </div>
                </div>
            </div>
        </form>
        </div>
                    </div>
                </div>
            </div>
        </div>

<x-footer/>