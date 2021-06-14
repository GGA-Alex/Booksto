@extends('layouts.Booksto - Layouts.bookstoAuth')

@section('content')
    <section class="sign-in-page">
        <div class="container p-0">
            <div class="row no-gutters height-self-center">
                <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                        <div class="col-sm-12 sign-in-page-data">
                            <div class="sign-in-from bg-primary rounded">
                                <h3 class="mb-0 text-center text-white">Iniciar Sesión</h3>
                                <x-jet-validation-errors class="m-4" />
                                <form class="mt-4 form-text" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Correo:</label>
                                        <input type="email" :value="old('email')" class="form-control mb-0" id="email"
                                            name="email" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Contraseña:</label>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="float-right text-dark">¿Se te
                                                olvido la contraseña?</a>
                                        @endif
                                        <input type="password" class="form-control mb-0" id="password" name="password"
                                            required autocomplete="current-password">
                                    </div>
                                    <div class="sign-info text-center">
                                        <button type="submit" class="btn btn-white d-block w-100 mb-2">Iniciar
                                            Sesión</button>
                                        <span class="text-dark dark-color d-inline-block line-height-2">¿No tienes una
                                            cuenta? <a href="{{ route('register') }}"
                                                class="text-white">Registrarse</a></span>
                                    </div>
                                </form>
                                <form>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
