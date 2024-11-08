<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['username'] = $_POST['username']; 
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    setcookie("username", $_POST['username'], time() + 3600, "/");
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    
    if ($email === false) {
        echo "Invalid email format.";
    } else {
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        
        $_SESSION['username'] = $username;
        setcookie("email", $email, time() + 3600, "/");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>

    <link rel="stylesheet" href="styles.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
</head>

<body>
    <div class="navbar">
        <h5>Meet our Group :)</h5>
        <div class="quote">
            <blockquote>"Great things are not done by impulse, but by a series of small things brought together." </blockquote>
        </div>
    </div>
    
    <div class="forms-section">
        <h2>Submit Your Information</h2>
        <form action="index.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>

    <footer>
        <button id="back-to-top">Back to Top</button>
    </footer>

    <script>
        document.getElementById('back-to-top').addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>

</html>
