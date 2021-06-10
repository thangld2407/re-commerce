<?php
require_once "dbconnect.php";
session_start();
if (isset($_POST['login'])) 
{
    $un = $_POST['username'];
    $pw = $_POST['password'];
    $pass = md5($pw);
    $sql = "SELECT * FROM user WHERE username = '$un' AND password = '$pass'";
    $run = $connection->query($sql);

    if ($run->num_rows > 0)
    {
        $_SESSION['username'] = $un;
        $_SESSION['password'] = $pw;
    } else {
?>
        <script>
            alert("Username or Password not invalid");
            window.location.href = "login.php";
        </script>
    <?php }
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) { ?>
    <script>
        alert("Welcome Back !");
        window.location.href = "home-admin.php";
    </script>
<?php } ?>
<head>
    <link rel =  "stylesheet" type = "text/css" href="css/login.css">
</head>
<body>
	<center>
	<div class="container">
            <div class="login-form">
                <form action="" method="post">
                    <h1>Login Admin</h1>
                    <div class="input-box">
                        <i ></i>
                        <input type="text" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="input-box">
                        <i></i>
                        <input type="password" name = "password" placeholder="Enter your password" required>
                    </div>
                    <div class="btn-box">
                        <button type="submit" value="Login" name="login"> Login</button>
                    </div>
                </form>
            </div>
 	</div>
	</center>
</body>
