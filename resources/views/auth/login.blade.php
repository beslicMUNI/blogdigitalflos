@extends('layouts.app')

@section('content')
<x-guest-layout>
    <x-auth-card>
        <h1>Login</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@stop