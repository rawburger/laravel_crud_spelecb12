
@extends('layouts.apptwo')

<div class="vh-100">
  <div class="flex-fill bg-gradient" style="padding:20px; background:linear-gradient(135deg,#667eea,#764ba2);">
  </div>
  <div class="flex-fill d-flex align-items-center justify-content-center">
    <form action="{{ route('store') }}" method="post" class="bg-white card p-4 rounded" style="width:100%; max-width:400px;">
      @csrf
      <h3 class="mb-3 text-center">Register</h3>

      <div class="form-group mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="{{ old('username') }}">
        @error('username') 
          {{ $message }} 
        @enderror
      </div>

      <div class="form-group mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        @error('password')
          {{ $message }}
        @enderror
      </div>

      <div class="form-group mb-3">
        <label>Confirm Password</label>
        <input type="password" name="password_confirm" class="form-control">
      </div>
      
      <button type="submit" class="btn btn-primary w-100">Register</button>

      <div class="text-center mt-3">
            <a href="{{ route('login') }}">Already have an account?</a>
        </div>
    </form>
  </div>
</div>

