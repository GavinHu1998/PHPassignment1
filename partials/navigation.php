<nav>
    <ul>
        <li>
            <a class="<?php echo setActiveCLass("index.php")?>" href="index.php">Home</a>
        </li>
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
        <li>
            <a class="<?php echo setActiveCLass("dashboard.php")?>" href="dashboard.php">Dashboard</a>
        </li>
        <li>
            <a class="<?php echo setActiveCLass("logout.php")?>" href="logout.php">Logout</a>
        </li>
        <?php else: ?>
            <li>
                <a class="<?php echo setActiveCLass("register.php")?>" href="register.php">Register</a>
            </li>
            <li>
                <a class="<?php echo setActiveCLass("login.php")?>" href="login.php">Login</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>