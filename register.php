<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box form_box">

        <?php
        include("php/confg.php");

        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

            // Verifying the unique email
            $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email = '$email'");

            if(mysqli_num_rows($verify_query) != 0){
                echo "<div class='message'>
                <p>This email is already in use. Please try another one.</p>
                </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go back </button></a>";
            }
            else{
                mysqli_query($con, "INSERT INTO users(Username, Email, Age, Password) VALUES('$username', '$email', '$age', '$password')") or die("Error Occurred");
                echo "<div class='message'>
                <p>Registration Successful!</p>
                </div> <br>";
                echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
            }
        }
        ?>
            <header>Signup</header>
            <form method="post" action="">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>

                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
