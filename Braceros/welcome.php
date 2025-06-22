<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Welcome - Braceros' Merchandise</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom right, #fdfdfd, #b0c4de); 
      color: white;
    }

    body {
      flex: 1;
      padding-top: 90px;
    }

    .navbar {
      background-color: #000;
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

    .nav-link {
      color: white !important;
    }

    .nav-link:hover {
      color: gold !important;
    }

    .hero-section {
      padding: 100px 20px;
      background: #111;
      text-align: center;
      border-top: 6px solid gold;
      border-radius: 12px;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.4);
      margin: 30px auto;
      max-width: 900px;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
      color: gold;
      margin-bottom: 20px;
    }

    .hero-section p {
      font-size: 1.1rem;
      color: #ddd;
      max-width: 600px;
      margin: 0 auto 30px;
    }

    .btn-explore {
      background-color: gold;
      color: black;
      padding: 10px 30px;
      font-weight: 600;
      border: none;
      border-radius: 5px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-explore:hover {
      background-color: #ffcc00;
      transform: scale(1.03);
    }

    .features-section {
      padding: 60px 20px;
    }

    .feature-box {
      background: #1c1c1c;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.4);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 25px rgba(255, 215, 0, 0.1);
    }

    .feature-box h4 {
      color: gold;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .feature-box p {
      color: #ccc;
      font-size: 0.95rem;
    }

    footer {
      background-color: #000;
      font-size: 0.9rem;
      color: white;
      padding: 1rem 0;
      margin-top: auto;
    }

    .btn-social i {
      font-size: 1.2rem;
      color: white;
    }

    .btn-social:hover i {
      color: gold;
    }

    .btn-warning {
      background-color: gold;
      color: black;
      border: none;
      font-weight: 600;
    }

    .btn-warning:hover {
      background-color: #ffcc00;
      color: black;
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

<section class="hero-section">
  <h1>Welcome!</h1>
  <p>Thank you for logging in to Braceros' Merchandise. Explore our amazing offers and custom-made products crafted just for you!</p>
  <a href="index.php" class="btn btn-explore">Explore Now</a>
</section>

<footer class="footer">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 text-lg-start">© Gilro R. Braceros 2025</div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
