@extends('layouts.app')

@section('content')
<x-guest-layout>
    <x-auth-card>
        <h1>Register</h1>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>

                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" required />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="name">Confirm password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    required />
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register">
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@stop