<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="#" class="h1">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="login-box-msg">
            {{ __('You are only one step a way from your new password, recover your password now.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="input-group mb-3">
                <x-input id="email" class="rounded-0" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                <div class="input-group-append">
                    <div class="input-group-text rounded-0">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="input-group mb-3">
                <x-input id="password" class="rounded-0" type="password" name="password" required placeholder="Enter Password" />
                <div class="input-group-append">
                    <div class="input-group-text rounded-0">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="input-group mb-3">
                <x-input id="password_confirmation" class="rounded-0"
                         type="password"
                         name="password_confirmation" placeholder="Enter Password" required />
                <div class="input-group-append">
                    <div class="input-group-text rounded-0">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <x-button class="btn-primary btn-block">
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
