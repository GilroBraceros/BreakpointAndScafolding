<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $inputUsername = trim($_POST['username']);
  $inputPassword = trim($_POST['password']);
  $users = file("user.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  $found = false;

  foreach ($users as $userLine) {
    $data = explode("|", $userLine);

    if (count($data) < 13) continue;

    $storedUsername = trim($data[11]);
    $storedPassword = trim($data[12]);

    if ($storedUsername === $inputUsername && $storedPassword === $inputPassword) {
      $found = true;
      $_SESSION['user_data'] = $data;
      header("Location: welcome.php");
      exit;
    }
  }

  if (!$found) {
    echo "<div class='alert alert-danger text-center' role='alert'>Invalid username or password.</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Braceros' Merchandise</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom right, #fdfdfd, #b0c4de); 
      color: #000;
      padding-top: 100px;
      margin: 0;
    }


    .navbar {
      background-color: #000;
    }

    .navbar-brand {
      color: gold !important;
      font-size: 1.8rem;
      font-weight: 800;
      letter-spacing: 0.5px;
    }

    .navbar-brand:hover {
      color: #ffd700 !important;
    }

    .nav-link {
      color: white !important;
      font-weight: 500;
    }

    .nav-link:hover {
      color: gold !important;
    }

    .login-box {
      max-width: 420px;
      margin: 60px auto;
      background: #111;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
      border-top: 6px solid gold;
    }

    .login-box h2 {
      text-align: center;
      color: gold;
      margin-bottom: 30px;
      font-weight: 700;
    }

    .form-label {
      font-weight: 500;
      color: #f8f9fa;
    }

    .form-control {
      background-color: #222;
      color: #fff;
      border: 1px solid #555;
    }

    .form-control:focus {
      border-color: gold;
      box-shadow: none;
    }

    .btn-primary {
      background-color: gold;
      color: black;
      font-weight: 600;
      border: none;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
      background-color: #ffcc00;
      transform: scale(1.03);
    }

    .text-center a {
      color: #00b4d8;
      text-decoration: none;
    }

    .text-center a:hover {
      text-decoration: underline;
    }

    footer {
      background-color: #000;
      font-size: 0.9rem;
      color: white;
    }

    .btn-social i {
      font-size: 1.2rem;
      color: white;
    }

    .btn-social:hover i {
      color: gold;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="#">Braceros' Merchandise</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
      aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars ms-1"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="regform.php">Register</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Log-in</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="login-box">
    <h2>Login</h2>
    <form method="post" action="">
      <div class="mb-3">
        <label for="username" class="form-label">Username or Email</label>
        <input type="text" class="form-control" id="username" name="username" required 
          value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>">
      </div>
      <div class="mb-2">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3 text-end">
        <a href="#" class="text-decoration-none">Forgot Password?</a>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      <div class="text-center mt-3">
        <small style="color: aliceblue">Don't have an account? <a href="regform.php">Register here</a></small>
      </div>
    </form>
  </div>
</div>

<footer class="footer py-4 mt-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 text-lg-start">© Gilro R. Braceros 2023</div>
      <div class="col-lg-4 my-3 my-lg-0 text-center">
        <a class="btn btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a class="btn btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <div class="col-lg-4 text-lg-end">
        <a class="link-light text-decoration-none me-3" href="#!">Privacy Policy</a>
        <a class="link-light text-decoration-none" href="#!">Terms of Use</a>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
