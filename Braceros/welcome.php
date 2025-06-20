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
    .hero-section {
      padding: 100px 20px;
      background: #ffffff;
      text-align: center;
      border-top: 6px solid #00b4d8;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.05);
      margin-bottom: 40px;
    }
    .hero-section h1 {
      font-size: 3rem;
      font-weight: 600;
      color: #0077b6;
      margin-bottom: 20px;
    }
    .hero-section p {
      font-size: 1.1rem;
      color: #495057;
      max-width: 600px;
      margin: 0 auto 30px;
    }
    .btn-explore {
      background-color: #00b4d8;
      color: white;
      padding: 10px 30px;
      border: none;
      font-weight: 600;
      border-radius: 5px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .btn-explore:hover {
      background-color: #0077b6;
      transform: scale(1.03);
    }
    .features-section {
      padding: 60px 20px;
    }
    .feature-box {
      background: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.08);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .feature-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 25px rgba(0,0,0,0.12);
    }
    .feature-box h4 {
      color: #0077b6;
      font-weight: 600;
      margin-bottom: 15px;
    }
    .feature-box p {
      color: #495057;
      font-size: 0.95rem;
    }
    footer {
      background-color: #f8f9fa;
      font-size: 0.9rem;
      margin-top: 60px;
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
    <div class="ms-auto">
      <a href="logout.php" class="btn btn-warning fw-semibold">Logout</a>
    </div>
  </div>
</nav>


<section class="hero-section">
  <h1>Welcome!</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec velit in arcu ultricies vulputate sed nec nisl.</p>
  <a href="index.php" class="btn btn-explore">Explore Now</a>
</section>


<footer class="footer py-4">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 text-lg-start">Copyright &copy; Gilro R. Braceros 2025</div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
