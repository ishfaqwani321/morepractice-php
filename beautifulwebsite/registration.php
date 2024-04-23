<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* .footer {
      
      
      width: 100%;
      height: 30px;
      background-color: #f5f5f5;
      margin: 0;
    } */
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Facebook</a>
</nav>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Sign Up</h2>
          <form method="POST">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="First name" name="first_name" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email address" name="email" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
              <label for="birthday">Birthday</label>
              <input type="date" class="form-control" id="birthday" name="birthday" required>
            </div>
            <div class="form-group">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="male" name="gender" class="custom-control-input" value="male" required>
                <label class="custom-control-label" for="male">Male</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="female" name="gender" class="custom-control-input" value="female" required>
                <label class="custom-control-label" for="female">Female</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<?php
// Database connection parameters
$servername = "localhost";  // Change this if your database is on a different server
$username = "root";  // Change this to your database username
$password = "";  // Change this to your database password
$dbname = "database3";  // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Escape user inputs for security
  $firstname = $conn->real_escape_string($_POST['first_name']);
  $lastname = $conn->real_escape_string($_POST['last_name']);
  $email = $conn->real_escape_string($_POST['email']);
  $password = $conn->real_escape_string($_POST['password']);
  $birthday = $conn->real_escape_string($_POST['birthday']);
  $gender = $conn->real_escape_string($_POST['gender']);

  // Prepare and bind the INSERT statement
  $stmt = $conn->prepare("INSERT INTO mytable2 (first_name, last_name, email, password, birthday, gender) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $firstname, $lastname, $email, $password, $birthday, $gender);

  if ($stmt->execute()) {
    echo "Registration successful!";
  } else {
    echo "Error: " . $stmt->error;
  }
}

// Close prepared statement
$stmt->close();

// Close database connection
$conn->close();
?>



// <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
// <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
// <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
