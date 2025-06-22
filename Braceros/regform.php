<?php
session_start();

$errors = [];
$firstname = $lastname = $gender = $birth = $phone = $email = "";
$street = $city = $province = $zipcode = $country = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $gender = $_POST['gender'];
    $birth = $_POST['birth'];
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $street = trim($_POST['street']);
    $city = trim($_POST['city']);
    $province = trim($_POST['province']);
    $zipcode = trim($_POST['zipcode']);
    $country = trim($_POST['country']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $firstname)) {
        $errors[] = "First name must be letters and spaces only, 2-50 characters.";
    }
    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $lastname)) {
        $errors[] = "Last name must be letters and spaces only, 2-50 characters.";
    }
    if (!in_array($gender, ['Male', 'Female', 'Other'])) {
        $errors[] = "Invalid gender selected.";
    }
    $birthDate = DateTime::createFromFormat('Y-m-d', $birth);
    if (!$birthDate || (new DateTime())->diff($birthDate)->y < 18) {
        $errors[] = "You must be at least 18 years old.";
    }
    if (!preg_match("/^09\d{9}$/", $phone)) {
        $errors[] = "Phone number must be 11 digits starting with 09.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (!preg_match("/^[a-zA-Z0-9\s.,'#\-]{5,100}$/", $street)) {
        $errors[] = "Street must be 5-100 characters.";
    }
    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $city)) {
        $errors[] = "City must be letters and spaces only, 2-50 characters.";
    }
    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $province)) {
        $errors[] = "Province must be letters and spaces only, 2-50 characters.";
    }
    if (!preg_match("/^\d{4}$/", $zipcode)) {
        $errors[] = "Zip code must be exactly 4 digits.";
    }
    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $country)) {
        $errors[] = "Country must be letters and spaces only.";
    }
    if (!preg_match("/^\w{5,20}$/", $username)) {
        $errors[] = "Username must be 5-20 characters, letters, digits, and underscores only.";
    }
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters with uppercase, lowercase, digit, and special character.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (file_exists("user.txt")) {
        $users = file("user.txt", FILE_IGNORE_NEW_LINES);
        foreach ($users as $line) {
            $parts = explode("|", $line);
            if (isset($parts[11]) && $parts[11] === $username) {
                $errors[] = "Username already taken.";
                break;
            }
        }
    }

    if (empty($errors)) {
        $data = implode("|", [
            $firstname, $lastname, $gender, $birth, $phone,
            $email, $street, $city, $province, $zipcode, $country,
            $username, $password
        ]) . "\n";

        if (file_put_contents("user.txt", $data, FILE_APPEND) === false) {
            $errors[] = "Failed to save user data. Check file permissions.";
        } else {
            echo "<script>alert('Registration successful! Please login.'); window.location='login.php';</script>";
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Braceros' Merchandise Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
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

.register-form {
  max-width: 850px;
  margin: 40px auto;
  padding: 40px;
  background: #111;
  border-radius: 16px;
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
  border-top: 6px solid gold;
}

h2 {
  font-weight: 700;
  color: gold;
  margin-bottom: 30px;
  text-align: center;
}

h5 {
  border-left: 4px solid gold;
  padding-left: 10px;
  margin-top: 25px;
  font-weight: 600;
  color: white;
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

.btn-reset {
  background-color: #6c757d;
  border: none;
  color: white;
  font-weight: 600;
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-reset:hover {
  background-color: #5a6268;
  transform: scale(1.02);
  color: white;
  text-decoration: none;
}

.form-actions {
  display: flex;
  justify-content: space-between;
  margin-top: 1.5rem;
}

.text-center a {
  text-decoration: none;
  color: #00b4d8;
}

.text-center a:hover {
  text-decoration: underline;
}

footer {
  background-color: #000;
  font-size: 0.9rem;
  color: white;
  margin-top: 60px;
  text-align: center;
  padding: 1rem 0;
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
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Log-in</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container register-form">
  <h2>Registration Form</h2>

  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <ul class="mb-0">
        <?php foreach ($errors as $error): ?>
          <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="post" action="regform.php">
    <h5>Personal Information</h5>
    <div class="row mb-3">
      <div class="col">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" name="firstname" id="firstname" class="form-control" required value="<?= htmlspecialchars($firstname) ?>" />
      </div>
      <div class="col">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" name="lastname" id="lastname" class="form-control" required value="<?= htmlspecialchars($lastname) ?>" />
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select" required>
          <option value="">Select</option>
          <option <?= $gender === 'Male' ? 'selected' : '' ?>>Male</option>
          <option <?= $gender === 'Female' ? 'selected' : '' ?>>Female</option>
          <option <?= $gender === 'Other' ? 'selected' : '' ?>>Other</option>
        </select>
      </div>
      <div class="col">
        <label for="birth" class="form-label">Date of Birth</label>
        <input type="date" name="birth" id="birth" class="form-control" required value="<?= htmlspecialchars($birth) ?>" />
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" name="phone" id="phone" class="form-control" required value="<?= htmlspecialchars($phone) ?>" />
      </div>
      <div class="col">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" name="email" id="email" class="form-control" required value="<?= htmlspecialchars($email) ?>" />
      </div>
    </div>

    <h5>Address Details</h5>
    <div class="mb-3">
      <label for="street" class="form-label">Street</label>
      <input type="text" name="street" id="street" class="form-control" required value="<?= htmlspecialchars($street) ?>" />
    </div>
    <div class="row mb-3">
      <div class="col">
        <label for="city" class="form-label">City</label>
        <input type="text" name="city" id="city" class="form-control" required value="<?= htmlspecialchars($city) ?>" />
      </div>
      <div class="col">
        <label for="province" class="form-label">Province</label>
        <input type="text" name="province" id="province" class="form-control" required value="<?= htmlspecialchars($province) ?>" />
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        <label for="zipcode" class="form-label">Zip Code</label>
        <input type="text" name="zipcode" id="zipcode" class="form-control" required value="<?= htmlspecialchars($zipcode) ?>" />
      </div>
      <div class="col">
        <label for="country" class="form-label">Country</label>
        <input type="text" name="country" id="country" class="form-control" required value="<?= htmlspecialchars($country) ?>" />
      </div>
    </div>

    <h5>Account Details</h5>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" id="username" class="form-control" required value="<?= htmlspecialchars($username) ?>" />
    </div>
    <div class="row mb-3">
      <div class="col">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required />
      </div>
      <div class="col">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required />
      </div>
    </div>

    <div class="form-actions">
      <button type="button" class="btn-reset" onclick="clearForm()">Reset</button>
      <button type="submit" class="btn btn-primary">Register</button>

    </div>
  </form>

  <div class="text-center mt-3">
    <p style="color:azure">Already have an account? <a href="login.php">Login here</a></p>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function clearForm() {
    const form = document.querySelector("form");
    form.reset();

    form.querySelectorAll("input[type='text'], input[type='email'], input[type='tel'], input[type='date'], input[type='password']").forEach(input => {
      input.value = "";
    });

    form.querySelectorAll("select").forEach(select => {
      select.selectedIndex = 0;
    });
  }
</script>

</body>
</html>
