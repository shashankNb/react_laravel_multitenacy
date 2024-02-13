<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="#" class="h1">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <p class="login-box-msg">Sign in to start your session</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('client.login') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <x-input id="email" class="rounded-0" type="email" name="email" :value="old('email')" placeholder="Enter Email" required autofocus />
                <div class="input-group-append">
                    <div class="input-group-text rounded-0">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <x-input id="password"
                         class="rounded-0"
                         type="password"
                         name="password"
                         placeholder="Enter Password"
                         required autocomplete="current-password" />
                <div class="input-group-append">
                    <div class="input-group-text rounded-0">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <!-- <div class="icheck-primary">
                        <input id="remember" type="checkbox" name="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                    </div> -->
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <x-button class="btn-primary btn-block rounded-0">
                        {{ __('Log in') }}
                    </x-button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <p class="mb-0">
        </p>
    </x-auth-card>
</x-guest-layout>
