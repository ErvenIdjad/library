<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body>
    <?php
    session_start();
    $users = array(
        "user1" => array(
            "username" => 'admin',
            "password" => 'pass',
        ),
        "user2" => array(
            "username" => 'root',
            "password" => 'root',
        )
        );

        if(isset($_POST['btn'])){
            $username = htmlentities($_POST['username']);
            $password = htmlentities($_POST['password']);

            foreach($users as $keys => $value){
                if($username == $value['username'] && $password == $value['password']){
                    $_SESSION['logged-in'] = $value['username'];
                    header('location: ../admin/dashboard.php');
                }

            }
            $error = 'Invalid username/password. Try again.';
        }

    ?>



    <div class="container">
        <form action="login.php" method="post" class="login-form">
            <div class="details">
                <span class="signin">SIGN IN</span>
                <i class='bx bxs-book-heart'></i>
            </div>
            <hr class="divider">
            <label for="username">Username</label>
            <input type="text" name="username">
            <label for="password">Password</label>
            <input type="password" name="password">
            <button class="btn" name="btn">SIGN IN</button>
            <a href="login.php"><p class="forgot">Forgot password?</p></a>
            <?php
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
        </form>
    </div>
</body>
</html>