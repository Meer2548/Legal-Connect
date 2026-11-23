<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forgot Password</title>
  <link rel="icon" href="img/logo Lawyer.png" type="image/png">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: url('img/ChatGPT Image Jun 14, 2025, 11_27_53 PM.png'); /* Adjust path as needed */
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
      padding: 30px;
      border-radius: 10px;
      width: 100%;
      max-width: 400px;
      text-align: center;
      background: rgba(15, 15, 15, 0.53);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(2.1px);
      -webkit-backdrop-filter: blur(7.1px);
      border: 1px solid rgba(255, 252, 252, 0.105);
    }

    .form-box h2 {
      margin-bottom: 15px;
      color: #ffffff;
    }

    .form-box p {
      font-size: 14px;
      color: #c9c9c9;
      margin-bottom: 20px;
    }

    .form-box label {
      display: block;
      text-align: left;
      margin-top: 10px;
      font-weight: bold;
      color: #ffffff;
    }

    .form-box input[type="email"] {
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

    .status-message {
      margin-bottom: 15px;
      color: #4ade80;
      font-size: 14px;
    }

    .error-list {
      color: #f87171;
      font-size: 13px;
      margin-bottom: 15px;
      text-align: left;
    }
     .logo{
    height: 60px !important;
   }
  </style>
</head>
<body>

<!--Navbar -->
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
    <form class="form-box" method="POST" action="{{ route('password.email') }}">
      @csrf

      <h2>Forgot Password?</h2>
      <p>No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

      @if (session('status'))
        <div class="status-message">
          {{ session('status') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="error-list">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus />

      <button type="submit">Email Password Reset Link</button>
    </form>
  </div>
</body>
</html>
