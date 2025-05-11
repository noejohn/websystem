<?php
// Database credentials
$host = 'localhost';
$dbname = 'contact_db';
$username = 'root';
$password = '';

// Create DB connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sanitize and assign POST values
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$message = htmlspecialchars(trim($_POST['message']));

// Start HTML output
echo '<!DOCTYPE html>
<html>
<head>
  <title>Form Response</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center;
      font-family: Arial, sans-serif;
    }
    .container {
      font-size: 24px;  
    }
    .button {
      margin-top: 5px;
      padding: 10px 20px;
      font-size: 18px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      text-decoration: none;
    }
    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">';

if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($message)) {
  $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);

  if ($stmt->execute()) {
    echo "Message sent successfully!";
  } else {
    echo "Something went wrong. Try again later.";
  }

  $stmt->close(); 
} else {
  echo "Please fill out all fields correctly.";
}

echo '<br><a class="button" href="index.html">Go Back</a>
  </div>
</body>
</html>';


$conn->close();
?>
