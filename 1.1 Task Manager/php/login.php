<!DOCTYPE html>
<html>
<?php
include 'dbconfig.php';
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
    <title>NCV Task Manage</title>
    <link href="css/taskmanage.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['username'])) {
        header('Location: index.php');
        exit;
    }
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $sql = "Select * from users where username = '$username' and password = '$password'";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            if (mysqli_num_rows($query) == 0) {
                err('Tài khoản hoặc mật khẩu không đúng!');
            } else {
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit;
            }
        } else {
            err('Lỗi không xác định!');
        }
    }
    ?>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <div class="fadeIn first">
                <h1 style="font-family: 'Courier New', Courier, monospace; color: cornflowerblue; padding-top: 1ch;">Đăng nhập</h1>
            </div>

            <!-- Login Form -->
            <form action="" method="POST">
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="Tài khoản">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mật khẩu">
                <input type="submit" class="fadeIn fourth" value="Đăng nhập">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="new.php">Đăng ký mới?</a>
            </div>
        </div>
    </div>
</body>

</html>