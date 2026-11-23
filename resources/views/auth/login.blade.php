<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Law Portal Login</title>
  <link rel="icon" href="img/logo Lawyer.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-image: url('img/ChatGPT Image Jun 14, 2025, 11_27_53 PM.png'); /* update path if needed */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .container {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      backdrop-filter: brightness(0.8);
    }

    .form-box {
      color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      width: 100%;
      max-width: 400px;
      background: rgba(15, 15, 15, 0.53);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(2.1px);
      -webkit-backdrop-filter: blur(7.1px);
      border: 1px solid rgba(255, 252, 252, 0.105);
    }

    .form-box h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-box label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    .form-box input[type="email"],
    .form-box input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-box .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
      font-size: 14px;
    }

    .form-box .options label {
      display: flex;
      align-items: center;
    }

    .form-box .options input[type="checkbox"] {
      margin-right: 5px;
    }

    .form-box .options a {
      color: #ffffff;
      text-decoration: none;
    }

    .form-box .options a:hover {
      color: #007bff;
      text-decoration: underline;
    }

    .form-box button {
      margin-top: 20px;
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .form-box button:hover {
      background-color: #06417c;
      transition-duration: 0.5s;
    }
     .logo{
    height: 60px !important;
   }
  </style>
</head>
<body>

<!-- Glass Navbar -->
<div style="
  width: 100%;
  padding: 15px 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #1E2942;
  color: #ffffff;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 100;
">
  <!-- Left: Logo -->
  <a class="navbar-brand" href="/">
      <img class="logo" src="img/logo Lawyer.png" alt="Logo"/>
    </a>

  <!-- Right: Go Back to Home Button -->
  <a href="/" style="
    background-color: #007bff;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    text-decoration: none;
    margin-right: 40px;
  " onmouseover="this.style.backgroundColor='#06417c'" onmouseout="this.style.backgroundColor='#007bff'">
    Go Back to Home
  </a>
</div>



  <div class="container">
    <form class="form-box" method="POST" action="{{ route('login') }}">
      {!! csrf_field() !!}
      <h2>Login</h2>

      @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-400">
          {{ session('status') }}
        </div>
      @endif

      <x-validation-errors class="mb-4 text-red-300" />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required autocomplete="current-password" />

      <div class="options">
        <label><input type="checkbox" name="remember"> Remember me</label>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">Forgot your password?</a>
        @endif
      </div>

      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
