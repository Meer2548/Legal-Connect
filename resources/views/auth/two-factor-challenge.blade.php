<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Two-Factor Authentication</title>
  <link rel="icon" href="img/logo Lawyer.png" type="image/png">
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
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
      transition-duration: 0.5s;
    }

    .toggle-link {
      display: block;
      text-align: center;
      margin-top: 10px;
      font-size: 13px;
      color: #ffffff;
      cursor: pointer;
      text-decoration: underline;
    }

    .toggle-link:hover {
      color: #1473d2;
    }

    .error-list {
      color: red;
      font-size: 13px;
      margin-bottom: 10px;
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
    <form method="POST" action="{{ route('two-factor.login') }}" class="form-box" x-data="{ recovery: false }">
      @csrf

      <h2>Two-Factor Authentication</h2>

      @if ($errors->any())
        <ul class="error-list">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif

      <div x-show="!recovery">
        <p style="font-size: 13px; margin-bottom: 15px;">
          {{ __('Please enter the authentication code from your app.') }}
        </p>
        <label for="code">Authentication Code</label>
        <input type="text" name="code" id="code" inputmode="numeric" autocomplete="one-time-code" x-ref="code" required>
      </div>

      <div x-show="recovery" x-cloak>
        <p style="font-size: 13px; margin-bottom: 15px;">
          {{ __('Please enter one of your recovery codes.') }}
        </p>
        <label for="recovery_code">Recovery Code</label>
        <input type="text" name="recovery_code" id="recovery_code" autocomplete="one-time-code" x-ref="recovery_code" required>
      </div>

      <span class="toggle-link" x-show="!recovery" @click="recovery = true; $nextTick(() => $refs.recovery_code.focus())">
        {{ __('Use a recovery code') }}
      </span>

      <span class="toggle-link" x-show="recovery" x-cloak @click="recovery = false; $nextTick(() => $refs.code.focus())">
        {{ __('Use an authentication code') }}
      </span>

      <button type="submit">Log in</button>
    </form>
  </div>
</body>
</html>
