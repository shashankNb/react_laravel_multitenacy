<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="#" class="h1">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="login-box-msg">
            {{ __('You forgot your password? Here you can easily retrieve a new password.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="input-group mb-3">
                <x-input class="rounded-0" id="email" type="email" name="email" :value="old('email')" placeholder="Enter Email" required autofocus />
                <div class="input-group-append">
                    <div class="input-group-text rounded-0">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <x-button class="btn btn-primary btn-block">
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </div>
        </form>
        <p class="mt-3 mb-1">
            <a href="{{ route('admin.login') }}"><i class="fa fa-chevron-left"></i> Back to Login</a>
        </p>
    </x-auth-card>
</x-guest-layout>
