<?php

include 'config.php';

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'user already exist!';
    } else {
        mysqli_query($conn, "INSERT INTO `user_info`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
        $message[] = 'registered successfully!';
        header('location:login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - 3STRIPES STORE</title>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet" />

    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!--my style-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">3STRIPES<span>STORE</span>.</a>

        <div class="navbar-nav">
            <a href="index.php">Home</a>
            <a href="index.php#about">Tentang Kami</a>
            <a href="index.php#menu">Favorit</a>
            <a href="index.php#contact">Kontak</a>
        </div>

        <div class="navbar-extra">
            <a href="cart.php" id="user" aria-label="Search"><i data-feather="user"></i></a>
            <a href="cart.php" id="shopping-cart" aria-label="Search"><i data-feather="shopping-cart"></i></a>
            <a href="#" id="hamburger-menu" aria-label="Search"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- navbar end -->

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
        }
    }
    ?>

    <div class="form-container">

        <form action="" method="post">
            <h3>register</h3>
            <input type="text" name="name" required placeholder="enter username" class="box">
            <input type="email" name="email" required placeholder="enter email" class="box">
            <input type="password" name="password" required placeholder="enter password" class="box">
            <input type="password" name="cpassword" required placeholder="confirm password" class="box">
            <input type="submit" name="submit" class="btn" value="register now">
            <p>already have an account? <a href="login.php">login now</a></p>
        </form>

    </div>

    <!--footer start-->
    <footer>
        <div class="socials">
            <a href="https://www.instagram.com/bidefg"><i data-feather="instagram"></i></a>
            <a href="https://x.com/AbidMhmmd664?t=i9_LcjEYIq4pSXhjcMJ1dA&s=09"><i data-feather="twitter"></i></a>
            <a href="https://www.facebook.com/bid.bid.96199?mibextid=JRoKGi "><i data-feather="facebook"></i></a>
        </div>
        <div class="links">
            <a href="index.php">Home</a>
            <a href="index.php#about">Tentang Kami</a>
            <a href="index.php#menu">Favorit</a>
            <a href="index.php#contact">Kontak</a>
        </div>
        <div class="credit">
            <p>Created by <a href="https://wa.me/6285157756604">MuhammadAbid</a>. | &copy; 2024</p>
        </div>
    </footer>
    <!--footer end-->

    <!-- feather icons -->
    <script>
        feather.replace();
    </script>

    <!-- javascript -->
    <script src="assets/js/script.js"></script>
</body>

</html>