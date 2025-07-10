@extends('layouts.apptwo')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="min-width: 350px; max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4">Login</h3>
        
        <form action="{{ route('authenticate') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    class="form-control @error('username') is-invalid @enderror" 
                    value="{{ old('username') }}" 
                    required 
                >
                @error('username')
                        {{ $message }}
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    required 
                >
                @error('password')
                        {{ $message }}
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="reset" class="btn btn-outline-secondary">Clear</button>
                <a href="{{ route('register') }}">Create an account</a>
            </div>
        </form>
    </div>

</div>
