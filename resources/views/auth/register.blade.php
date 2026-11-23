<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registration</title>
  <link rel="icon" href="img/logo Lawyer.png" type="image/png">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: url('img/ChatGPT Image Jun 14, 2025, 11_27_53 PM.png');
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
      backdrop-filter: blur(7.1px);
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

    .form-box input {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-box button {
      margin-top: 20px;
      width: 100%;
      padding: 12px;
      background-color: #1473d2;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .form-box button:hover {
      background-color: #06417c;
      transition-duration: 0.50s;
    }

    .alr {
      display: block;
      color: #ffffff;
      font-size: 12px;
      text-decoration: none;
      margin-top: 10px;
      text-align: center;
    }

    .alr:hover {
      color: #1473d2;
      text-decoration: underline;
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

<br>
<br>
<br>
  <div class="container">
    <form class="form-box" method="POST" action="{{ route('register') }}">
      @csrf
      <h2>Register</h2>

      @if ($errors->any())
        <div style="color: red; font-size: 14px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <label for="password_confirmation">Confirm Password</label>
      <input type="password" id="password_confirmation" name="password_confirmation" required>

      <a href="{{ route('login') }}" class="alr">Already Registered?</a>
      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>
