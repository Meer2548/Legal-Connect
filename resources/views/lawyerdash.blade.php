<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lawyer Profile</title>
   <link rel="icon" href="img/logo Lawyer.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    .profile-container {
      display: flex;
      flex-wrap: wrap;
      min-height: 80vh;
      padding: 2rem;
    }
    .profile-image {
      flex: 1 1 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .profile-image img {
      max-width: 100%;
      height: auto;
      border-radius: 1rem;
      max-height: 400px;
      object-fit: cover;
    }
    .profile-info {
      flex: 1 1 50%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 2rem;
    }
    .profile-info h2 {
      font-size: 2rem;
      font-weight: bold;
    }
    .profile-info h5 {
      color: #6c757d;
      margin-bottom: 1rem;
    }
    .navbar-brand img {
      height: 40px;
      width: auto;
    }
    .navbar{
        background-color: #1E2942;
        }
   .logo{
    height: 60px !important;
   }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light  px-4">
    <a class="navbar-brand" href="#">
      <img class="logo" src="img/logo Lawyer.png" alt="Logo" />
    </a>
    <div class="ms-auto">
      <a href="{{ route('lawyer.requests') }}" class="btn btn-outline-primary">
     <i class="fas fa-paper-plane"></i> Requests
    </a>


     <a href="/" class="btn btn-outline-primary">
     <i class="fas fa-paper-plane"></i> Home
    </a>
    </div>
   </nav>

  <!-- Profile Section -->
  <div class="profile-container">
    <!-- Left: Image -->
    <div class="profile-image">
      <img src="lawyers/images/{{Auth::user()->lawyer_image}}" alt="User Picture" />
    </div>

    <!-- Right: Info -->
    <div class="profile-info">
      <h2>{{Auth::user()->name}}</h2>
      <h5>{{Auth::user()->lawyer_category}}</h5>
      <p>
        Dedicated to delivering sound legal solutions and impactful client experiences. <br>
        Experienced in both litigation and advisory roles across diverse legal domains. <br>
        Passionate about resolving complex legal issues with clarity, precision, and efficiency. <br>
        Continuously committed to professional development and excellence in the legal field.
      </p>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
