<?php include_once ('include/config.php');

if (isset($_POST['submit'])) {
	$fname = $_POST['full_name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");

	if ($query) {
		echo "<script>
 alert('Successfully Registered. You can login now');

    setTimeout(function() {
        window.location.href='user-login.php';
      }

      , 2000); // 2000 milliseconds = 2 seconds
    </script>";
		exit();
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>User Registration</title>
	<link
		href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
		rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	<style>
		.clearfix:after {
			content: "";
			display: block;
			clear: both;
			visibility: hidden;
			height: 0;
		}

		.form_wrapper {
			background: #fff;
			width: 400px;
			max-width: 100%;
			box-sizing: border-box;
			padding: 25px;
			margin: 8% auto 0;
			position: relative;
			z-index: 1;
			border-top: 5px solid #f5ba1a;
			-webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
			-moz-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
			box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
			-webkit-transform-origin: 50% 0%;
			transform-origin: 50% 0%;
			-webkit-transform: scale3d(1, 1, 1);
			transform: scale3d(1, 1, 1);
			-webkit-transition: none;
			transition: none;
			-webkit-animation: expand 0.8s 0.6s ease-out forwards;
			animation: expand 0.8s 0.6s ease-out forwards;
			opacity: 0;
		}

		.form_wrapper h2 {
			font-size: 1.5em;
			line-height: 1.5em;
			margin: 0;
		}

		.form_wrapper .title_container {
			text-align: center;
			padding-bottom: 15px;
		}

		.form_wrapper h3 {
			font-size: 1.1em;
			font-weight: normal;
			line-height: 1.5em;
			margin: 0;
		}

		.form_wrapper label {
			font-size: 12px;
		}

		.form_wrapper .row {
			margin: 10px -15px;
		}

		.form_wrapper .row>div {
			padding: 0 15px;
			box-sizing: border-box;
		}

		.form_wrapper .col_half {
			width: 50%;
			float: left;
		}

		.form_wrapper .input_field {
			position: relative;
			margin-bottom: 20px;
			-webkit-animation: bounce 0.6s ease-out;
			animation: bounce 0.6s ease-out;
		}

		.form_wrapper .input_field>span {
			position: absolute;
			left: 0;
			top: 0;
			color: #333;
			height: 100%;
			border-right: 1px solid #cccccc;
			text-align: center;
			width: 30px;
		}

		.form_wrapper .input_field>span>i {
			padding-top: 10px;
		}

		.form_wrapper .textarea_field>span>i {
			padding-top: 10px;
		}

		.form_wrapper input[type=text],
		.form_wrapper input[type=email],
		.form_wrapper input[type=password] {
			width: 100%;
			padding: 8px 10px 9px 35px;
			height: 35px;
			border: 1px solid #cccccc;
			box-sizing: border-box;
			outline: none;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-ms-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
		}

		.form_wrapper input[type=text]:hover,
		.form_wrapper input[type=email]:hover,
		.form_wrapper input[type=password]:hover {
			background: #fafafa;
		}

		.form_wrapper input[type=text]:focus,
		.form_wrapper input[type=email]:focus,
		.form_wrapper input[type=password]:focus {
			-webkit-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
			-moz-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
			box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
			border: 1px solid #f5ba1a;
			background: #fafafa;
		}

		.form_wrapper input[type=submit] {
			background: #f5ba1a;
			height: 35px;
			line-height: 35px;
			width: 100%;
			border: none;
			outline: none;
			cursor: pointer;
			color: #fff;
			font-size: 1.1em;
			margin-bottom: 10px;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-ms-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
		}

		.form_wrapper input[type=submit]:hover {
			background: #e1a70a;
		}

		.form_wrapper input[type=submit]:focus {
			background: #e1a70a;
		}



		.form_container .row .col_half.last {
			border-left: 1px solid #cccccc;
		}

		.checkbox_option label {
			margin-right: 1em;
			position: relative;
		}

		.checkbox_option label:before {
			content: "";
			display: inline-block;
			width: 0.5em;
			height: 0.5em;
			margin-right: 0.5em;
			vertical-align: -2px;
			border: 2px solid #cccccc;
			padding: 0.12em;
			background-color: transparent;
			background-clip: content-box;
			transition: all 0.2s ease;
		}

		.checkbox_option label:after {
			border-right: 2px solid #000000;
			border-top: 2px solid #000000;
			content: "";
			height: 20px;
			left: 2px;
			position: absolute;
			top: 7px;
			transform: scaleX(-1) rotate(135deg);
			transform-origin: left top;
			width: 7px;
			display: none;
		}

		.checkbox_option input:hover+label:before {
			border-color: #000000;
		}

		.checkbox_option input:checked+label:before {
			border-color: #000000;
		}

		.checkbox_option input:checked+label:after {
			-moz-animation: check 0.8s ease 0s running;
			-webkit-animation: check 0.8s ease 0s running;
			animation: check 0.8s ease 0s running;
			display: block;
			width: 7px;
			height: 20px;
			border-color: #000000;
		}

		.radio_option label {
			margin-right: 1em;
		}

		.radio_option label:before {

			display: inline-block;
			width: 0.5em;
			height: 0.5em;
			margin-right: 0.5em;
			border-radius: 100%;
			vertical-align: -3px;
			border: 2px solid #cccccc;
			padding: 0.15em;
			background-color: transparent;
			background-clip: content-box;
			transition: all 0.2s ease;
		}

		.radio_option input:hover+label:before {
			border-color: #000000;
		}

		.radio_option input:checked+label:before {
			background-color: #000000;
			border-color: #000000;
		}

		.select_option {
			position: relative;
			width: 100%;
		}

		.select_option select {
			display: inline-block;
			width: 100%;
			height: 35px;
			padding: 0px 15px;
			cursor: pointer;
			color: #7b7b7b;
			border: 1px solid #cccccc;
			border-radius: 0;
			background: #fff;
			appearance: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			transition: all 0.2s ease;
		}

		.select_option select::-ms-expand {
			display: none;
		}

		.select_option select:hover,
		.select_option select:focus {
			color: #000000;
			background: #fafafa;
			border-color: #000000;
			outline: none;
		}

		.select_arrow {
			position: absolute;
			top: calc(50% - 4px);
			right: 15px;
			width: 0;
			height: 0;
			pointer-events: none;
			border-width: 8px 5px 0 5px;
			border-style: solid;
			border-color: #7b7b7b transparent transparent transparent;
		}

		.select_option select:hover+.select_arrow,
		.select_option select:focus+.select_arrow {
			border-top-color: #000000;
		}

		.credit {
			position: relative;
			z-index: 1;
			text-align: center;
			padding: 15px;
			color: #f5ba1a;
		}

		.credit a {
			color: #e1a70a;
		}

		@-webkit-keyframes check {
			0% {
				height: 0;
				width: 0;
			}

			25% {
				height: 0;
				width: 7px;
			}

			50% {
				height: 20px;
				width: 7px;
			}
		}

		@keyframes check {
			0% {
				height: 0;
				width: 0;
			}

			25% {
				height: 0;
				width: 7px;
			}

			50% {
				height: 20px;
				width: 7px;
			}
		}

		@-webkit-keyframes expand {
			0% {
				-webkit-transform: scale3d(1, 0, 1);
				opacity: 0;
			}

			25% {
				-webkit-transform: scale3d(1, 1.2, 1);
			}

			50% {
				-webkit-transform: scale3d(1, 0.85, 1);
			}

			75% {
				-webkit-transform: scale3d(1, 1.05, 1);
			}

			100% {
				-webkit-transform: scale3d(1, 1, 1);
				opacity: 1;
			}
		}

		@keyframes expand {
			0% {
				-webkit-transform: scale3d(1, 0, 1);
				transform: scale3d(1, 0, 1);
				opacity: 0;
			}

			25% {
				-webkit-transform: scale3d(1, 1.2, 1);
				transform: scale3d(1, 1.2, 1);
			}

			50% {
				-webkit-transform: scale3d(1, 0.85, 1);
				transform: scale3d(1, 0.85, 1);
			}

			75% {
				-webkit-transform: scale3d(1, 1.05, 1);
				transform: scale3d(1, 1.05, 1);
			}

			100% {
				-webkit-transform: scale3d(1, 1, 1);
				transform: scale3d(1, 1, 1);
				opacity: 1;
			}
		}

		@-webkit-keyframes bounce {
			0% {
				-webkit-transform: translate3d(0, -25px, 0);
				opacity: 0;
			}

			25% {
				-webkit-transform: translate3d(0, 10px, 0);
			}

			50% {
				-webkit-transform: translate3d(0, -6px, 0);
			}

			75% {
				-webkit-transform: translate3d(0, 2px, 0);
			}

			100% {
				-webkit-transform: translate3d(0, 0, 0);
				opacity: 1;
			}
		}

		@keyframes bounce {
			0% {
				-webkit-transform: translate3d(0, -25px, 0);
				transform: translate3d(0, -25px, 0);
				opacity: 0;
			}

			25% {
				-webkit-transform: translate3d(0, 10px, 0);
				transform: translate3d(0, 10px, 0);
			}

			50% {
				-webkit-transform: translate3d(0, -6px, 0);
				transform: translate3d(0, -6px, 0);
			}

			75% {
				-webkit-transform: translate3d(0, 2px, 0);
				transform: translate3d(0, 2px, 0);
			}

			100% {
				-webkit-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
				opacity: 1;
			}
		}

		@media (max-width: 600px) {
			.form_wrapper .col_half {
				width: 100%;
				float: none;
			}

			.bottom_row .col_half {
				width: 50%;
				float: left;
			}

			.form_container .row .col_half.last {
				border-left: none;
			}

			.remember_me {
				padding-bottom: 20px;
			}
		}
	</style>
	<script type="text/javascript">function valid() {
			if (document.registration.password.value != document.registration.password_again.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.registration.password_again.focus();
				return false;
			}

			return true;
		}

	</script>
</head>

<body class="login">
	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">

			<div class="form_wrapper">
				<div class="form_container">
					<div class="title_container">
						<h2>HMS | Patient Registration</h2>
					</div>
					<div class="row clearfix">
						<div class="">
							<form name="registration" id="registration" method="post" onSubmit="return valid();">
								<div class="input_field"><span><i aria-hidden="true"
											class="fa fa-user"></i></span><input type="text" name="full_name"
										placeholder="Name" required /></div>
								<div class="input_field"><span><i aria-hidden="true"
											class="fa fa-envelope"></i></span><input type="email" name="email"
										placeholder="Email" required /></div>
								<div class="input_field"><span><i aria-hidden="true"
											class="fa fa-lock"></i></span><input type="password" name="password"
										placeholder="Password" required /></div>
								<div class="input_field"><span><i aria-hidden="true"
											class="fa fa-lock"></i></span><input type="text" name="address"
										placeholder="Address" required /></div>
								<div class="input_field"><span><i aria-hidden="true"
											class="fa fa-lock"></i></span><input type="text" name="city"
										placeholder="City" required /></div>
								<div class="input_field radio_option"><input type="radio" id="rg-male" name="gender"
										value="male"><label for="rd1">Male</label><input type="radio" id="rg-female"
										name="gender" value="female"><label for="rd2">Female</label></div>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/login.js"></script>
	<script>jQuery(document).ready(function () {
			Main.init();
			Login.init();
		});

	</script>
	<script>function userAvailability() {
			$("#loaderIcon").show();

			jQuery.ajax({

				url: "check_availability.php",
				data: 'email=' + $("#email").val(),
				type: "POST",
				success: function (data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				}

				,
				error: function () { }
			});
		}

	</script>
</body>

</html>