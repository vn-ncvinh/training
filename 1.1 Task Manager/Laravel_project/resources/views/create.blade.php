<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
    <title>Create new User - Task Manage</title>
    <link href="css/taskmanage.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function checkPass() {
            var pass1 = document.getElementById("password");
            var pass2 = document.getElementById("password2");
            var regbutton = document.getElementById("regbtn");
            if (pass2.value != "") {
                if (pass1.value == pass2.value) {
                    pass1.style.border = "2px solid green";
                    pass2.style.border = "2px solid green";
                    regbutton.disabled = false;
                } else {
                    pass1.style.border = "2px solid red";
                    pass2.style.border = "2px solid red";
                    regbutton.disabled = true;
                }
            }
        }
    </script>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <div class="fadeIn first">
                <h1 style="font-family: 'Courier New', Courier, monospace; color: cornflowerblue; padding-top: 1ch;">Đăng ký tài khoản</h1>
            </div>
            @if (\Session::has('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('message') !!}</li>
                </ul>
            </div>
            @endif
            <!-- Login Form -->
            <form action="" method="POST">
                @csrf
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="Tài khoản">
                <input type="text" id="fullname" class="fadeIn second" name="fullname" placeholder="Họ Tên">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mật Khẩu" onkeyup="checkPass();">
                <input type="password" id="password2" class="fadeIn third" name="password2" placeholder="Nhập lại mật khẩu" onkeyup="checkPass();">
                <input type="submit" class="fadeIn fourth" value="Đăng ký" id="regbtn">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="/login">Đăng nhập?</a>
            </div>

        </div>
    </div>
</body>

</html>