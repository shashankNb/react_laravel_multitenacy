<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="#" class="h1">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.register') }}">
            @csrf

            <!-- Name -->
            <div class="input-group mb-3">
                <x-input class="rounded-0" id="name" type="text" name="name" :value="old('name')" required autofocus placeholder="Enter Full Name" />
                <div class="input-group-append">
                    <div class="input-group-text rounded-0">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>

            <!-- Email Address -->
            <div class="input-group mb-3">
                <x-input class="rounded-0" id="email" type="email" name="email" :value="old('email')" required placeholder="Enter Email" />
                <div class="input-group-append">
                    <div class="input-group-text rounded-0">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="input-group mb-3">
                <x-input id="password"
                         class="rounded-0"
                         type="password"
                         name="password"
                         placeholder="Enter Password"
                         required autocomplete="new-password" />
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
                         placeholder="Re-type Password"
                         name="password_confirmation" required />
                <div class="input-group-append">
                    <div class="input-group-text rounded-0">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="btn-primary btn-flat float-right">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
