@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
  <div class="center-page">
    <form method="POST" action="{{ route('login.attempt') }}" class="form-card">
      @csrf
      <h1>Login Admin</h1>

      <div class="field">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email') <p class="error">{{ $message }}</p> @enderror
      </div>

      <div class="field">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        @error('password') <p class="error">{{ $message }}</p> @enderror
      </div>

      <div class="actions">
        <a href="{{ route('home') }}" class="btn btn-gray">Kembali</a>
        <button type="submit" class="btn">Masuk</button>
      </div>
    </form>
  </div>
@endsection
