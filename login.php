
<?php 
    include "partials/header.php";
    include "partials/navigation.php";
    // when user tpye /login.php in url.
    if(is_user_logged_in()){
        redirect("dashboard.php");
    }
    $error = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        // echo $email;
        // echo $password;
    
        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        // print_r($result);

        if(mysqli_num_rows($result) === 1){
            $user = mysqli_fetch_assoc($result);
            // print_r($user);
            if(password_verify($password, $user['password'])){
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $user['email'];
                redirect("dashboard.php");
            } else {
                $error =  "Invalid email or password";
            }
        } else {
    
            $error = "Invalid email";
    
            }
        }
?>
    <div class="container">
        <h2>Login</h2>
        <p style = "color:red"> <?php echo $error; ?> </p>    
        <form method="POST">
            <div>
                <label for="email">Email:</label>
                <input id = "email" placeholder="Enter your email" type="text" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input id = "password" placeholder="Enter your password" type="password" name="password" required>
            </div>
            <button type="submit" class = "btn">Login</button>
        </form>
    </div>

<?php
    include "partials/footer.php";
?>    
<?php
    mysqli_close($conn);
?>
