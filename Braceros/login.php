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
    echo "<div class='alert alert-danger' role='alert'> Invalid username or password. </div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Braceros' Merchandise</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #caf0f8, #ffffff);
      margin: 0;
      padding-top: 90px;
    }
    .navbar {
      background-color: #003366;
    }
    .navbar-brand {
      color: gold !important;
      font-size: 1.8rem;
      font-weight: 700;
      letter-spacing: 0.5px;
    }
    .navbar-brand:hover {
      color: #ffd700 !important;
    }
    .login-box {
      max-width: 420px;
      margin: 60px auto;
      background: #ffffff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 15px 25px rgba(0,0,0,0.1);
      border-top: 6px solid #00b4d8;
    }
    .login-box h2 {
      text-align: center;
      color: #0077b6;
      margin-bottom: 30px;
      font-weight: 600;
    }
    .form-label {
      font-weight: 500;
      color: #343a40;
    }
    .btn-primary {
      background-color: #00b4d8;
      border: none;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .btn-primary:hover {
      background-color: #0077b6;
      transform: scale(1.02);
    }
    .text-center a {
      text-decoration: none;
      color: #00b4d8;
    }
    .text-center a:hover {
      text-decoration: underline;
    }
    footer {
      background-color: #f8f9fa;
      font-size: 0.9rem;
    }
    .btn-social i {
      font-size: 1.2rem;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">Braceros' Merchandise</a>
  </div>
</nav>

<div class="container">
  <div class="login-box">
    <h2>Login</h2>
    <form method="post" action="">
      <div class="mb-3">
        <label for="username" class="form-label">Username or Email</label>
        <input type="text" class="form-control" id="username" name="username" required value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>">
      </div>
      <div class="mb-2">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3 text-end">
        <a href="#" class="text-decoration-none" style="color: #00b4d8;">Forgot Password?</a>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      <div class="text-center mt-3">
        <small>Don't have an account? <a href="regform.php">Register here</a></small>
      </div>
    </form>
  </div>
</div>

<footer class="footer py-4 mt-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 text-lg-start">Copyright &copy; Gilro R. Braceros 2023</div>
      <div class="col-lg-4 my-3 my-lg-0 text-center">
        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <div class="col-lg-4 text-lg-end">
        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
