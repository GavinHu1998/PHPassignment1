
<?php
include "partials/header.php";
include "partials/navigation.php";

if(is_user_logged_in()){
    redirect("dashboard.php");
}
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if the password and confirm match
    if($password !== $confirm_password){
        $error =  "Password do not match";
    } else {

        // check if username already exists
        if(user_exists($conn, $username)){
            $error = "Username already exists, Please choose another";
        } else {

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$passwordHash', '$email')";

            if(mysqli_query($conn, $sql)){
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                redirect("dashboard.php");
            }else {
                $error =  "SOMETHING HAPPENED not data inserted, error: " . mysqli_error($conn);
            };
        }
    }
}
?>

    <div class="container">
        <h2>Register</h2>
        <p style = "color:red"> <?php echo $error; ?> </p>    
        <form method="POST">
            <div>
                <label for="username">Username:</label>
                <input id="username" placeholder="Enter your username" type="text" name="username" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input id="email" placeholder="Enter your email" type="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input id="password" placeholder="Enter your password" type="password" name="password" required>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input id="confirm_password" placeholder="Confirm your password" type="password" name="confirm_password" required>
            </div>  
            <button type="submit" class = "btn">Register</button>
        </form>
    </div>

<?php include "partials/footer.php"; ?>
<?php
    mysqli_close($conn);
?>

