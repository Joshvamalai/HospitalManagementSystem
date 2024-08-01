<?php session_start();
error_reporting(0);
include ("include/config.php");
if (isset($_POST['submit'])) {
    $puname = $_POST['username'];
    $ppwd = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT * FROM users WHERE email='$puname' and password='$ppwd'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $_SESSION['login'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        $pid = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        // For storing log if user login successful
        $log = mysqli_query($con, "insert into userlog(uid,username,userip,status) values('$pid','$puname','$uip','$status')");
        header("location:dashboard.php");
    } else {
        // For storing log if user login unsuccessful
        $_SESSION['login'] = $_POST['username'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        mysqli_query($con, "insert into userlog(username,userip,status) values('$puname','$uip','$status')");
        echo "<script>alert('Invalid username or password');</script>";
        echo "<script>window.location.href = 'user-login.php'</script>";
    }
}
?>

<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="assets/css/plugins.css">
<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
<style>
    html {
        height: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: linear-gradient(#141e30, #243b55);
    }

    .login-box {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        padding: 40px;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, .5);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
        border-radius: 10px;
    }

    .login-box h2 {
        margin: 0 0 30px;
        padding: 0;
        color: #fff;
        text-align: center;
    }

    .login-box .user-box {
        position: relative;
    }

    .login-box .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
    }

    .login-box .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        pointer-events: none;
        transition: .5s;
    }

    .login-box .user-box input:focus~label,
    .login-box .user-box input:valid~label {
        top: -20px;
        left: 0;
        color: #03e9f4;
        font-size: 12px;
    }

    .login-box form a {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #03e9f4;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: .5s;
        margin-top: 40px;
        letter-spacing: 4px
    }

    .login-box a:hover {
        background: #03e9f4;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 5px #03e9f4,
            0 0 25px #03e9f4,
            0 0 50px #03e9f4,
            0 0 100px #03e9f4;
    }

    .login-box a span {
        position: absolute;
        display: block;
    }

    .login-box a span:nth-child(1) {
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #03e9f4);
        animation: btn-anim1 1s linear infinite;
    }

    @keyframes btn-anim1 {
        0% {
            left: -100%;
        }

        50%,
        100% {
            left: 100%;
        }
    }

    .login-box a span:nth-child(2) {
        top: -100%;
        right: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(180deg, transparent, #03e9f4);
        animation: btn-anim2 1s linear infinite;
        animation-delay: .25s
    }

    @keyframes btn-anim2 {
        0% {
            top: -100%;
        }

        50%,
        100% {
            top: 100%;
        }
    }

    .login-box a span:nth-child(3) {
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(270deg, transparent, #03e9f4);
        animation: btn-anim3 1s linear infinite;
        animation-delay: .5s
    }

    @keyframes btn-anim3 {
        0% {
            right: -100%;
        }

        50%,
        100% {
            right: 100%;
        }
    }

    .login-box a span:nth-child(4) {
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(360deg, transparent, #03e9f4);
        animation: btn-anim4 1s linear infinite;
        animation-delay: .75s
    }

    @keyframes btn-anim4 {
        0% {
            bottom: -100%;
        }

        50%,
        100% {
            bottom: 100%;
        }

    }

    .button-o {
        background: none;
        border: 1px solid #007aff;
        border-radius: 5px;
        box-sizing: border-box;
        color: #007aff;
        cursor: pointer;
        display: block;
        font-family: inherit;
        font-size: 14px;
        height: 29px;
        line-height: 27px;
        margin: 0;
        overflow: hidden;
        padding: 0 10px;
        position: relative;
        text-align: center;
        text-decoration: none;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .button-o:hover {
        background: #007aff;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 5px #007aff,
            0 0 25px #007aff,
            0 0 50px #007aff,
            0 0 100px #007aff;
    }
</style>

<div class="login-box">
    <h2>Patient Login</h2>
    <form class="form-login" method="post" autocomplete="off">
            <script>
                function showAlert() {
                    var errorMessage = "<?php echo $_SESSION['errmsg']; ?>";
                    if (errorMessage !== "") {
                        alert(errorMessage);
                        <?php echo $_SESSION['errmsg'] = ""; ?>
                    }
                }
                window.onload = showAlert;
            </script>
        </p>
        <div class="user-box">
            <input type="email" name="username" required>
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" required>
            <label>Password</label>
        </div>
        <!-- <a href="forgot-password.php">Forgot Password ?</a> -->
        <button type="submit" class="btn btn-primary button-o" name="submit">
            <span></span>
            Login <i class="fa fa-arrow-circle-right"></i>
        </button>
        <!-- <div class="new-account">
            Don't have an account yet?
            <a href="registration.php">Create an account</a>
        </div> -->
    </form>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<!-- <script src="vendor/jquery-validation/jquery.validate.min.js"></script> -->
<script src="assets/js/main.js"></script>
<script src="assets/js/login.js"></script>
<script>
    jQuery(document).ready(function () {
        Main.init();
        Login.init();
    });
</script>