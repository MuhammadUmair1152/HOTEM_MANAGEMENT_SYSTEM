<!-- 


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>FORM</title>
</head>

<body class="newform" style="background-image: url(./images/p1.jpg); background-size: cover;">

    <form action="home.html">
        <div class="form">
            <h2>Login Here</h2>

            <input type="text" placeholder="Enter Email Here" name="" id="">
            <input type="password" name="" placeholder="Enter Your Password" id="">
            <a href="" target="_blank"> <button class="buttonn">Login</button></a>

            <p class="link">Don't have an account<br>
                <a href="" target="_blank">Sign up </a> here</a>
            </p>
            <p class="login">Login with</p>

            <div class="icons">
                <a href="https://www.facebook.com/" target="_blank">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a href="https://www.instagram.com/accounts/login/?hl=en" target="_blank">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="https://twitter.com/?lang=en" target="_blank">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a>
                <a href="https://www.google.com/" target="_blank">
                    <ion-icon name="logo-Google"></ion-icon>
                </a>
                <a href="https://www.skype.com/en/" target="_blank">
                    <ion-icon name="logo-skype"></ion-icon>
                </a>

            </div>

        </div>

        </div>
        </div>
    </form>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>


</html> -->
<?php
include 'conection.php';

// Retrieve the username and password entered in the form
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query to check if the username exists in the database
    $stmt = $conn->prepare("SELECT * FROM `login` WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // If a row is returned, the username exists
    if ($result->num_rows === 1) {
        // Fetch the row from the result
        $row = $result->fetch_assoc();
        // Verify the password
        if ($password === $row['password']) { // Change this line if you hashed the passwords
            // Redirect to the home.html page
            header("Location: home.html");
            exit();
        }
    }
}

// Redirect back to the login page with an error message
// header("Location: index.php?error=1");
// exit();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>FORM</title>
</head>

<body class="newform" style="background-image: url(./images/p1.jpg); background-size: cover;">

    <form action="index.php" method="POST">
        <div class="form">
            <h2>Login Here</h2>

            <input type="text" placeholder="Enter Email Here" name="username" id="username">
            <input type="password" name="password" placeholder="Enter Your Password" id="password">
            <button class="buttonn" type="submit" name="name">Login</button>

            <p class="link">Don't have an account<br>
                <a href="" target="_blank">Sign up</a> here</a>
            </p>
            <p class="login">Login with</p>

            <div class="icons">
                <a href="https://www.facebook.com/" target="_blank">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a href="https://www.instagram.com/accounts/login/?hl=en" target="_blank">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="https://twitter.com/?lang=en" target="_blank">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a>
                <a href="https://www.google.com/" target="_blank">
                    <ion-icon name="logo-Google"></ion-icon>
                </a>
                <a href="https://www.skype.com/en/" target="_blank">
                    <ion-icon name="logo-skype"></ion-icon>
                </a>
            </div>
        </div>
    </form>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>

</html>
