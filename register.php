<?php
//ket noi csdl
include './admin/connect.php';

if (isset($_GET['submit'])) {
	//nhan du lieu tu form
	$username = $_POST['user-name'];
	$email = $_POST['user-email'];
	$password = $_POST['user-pass'];
	$repeatpass = $_POST['user-repeatpass'];

	if ($repeatpass != $password) {
		echo '<script> alert("Mật khẩu nhập lại không đúng"); 
        history.back();
        </script>';
	} else {
		$check_email = "SELECT * FROM accounts";
		$rs = mysqli_query($conn, $check_email);
		$user = mysqli_fetch_assoc($rs);
		if ($email == $user['email']) {
			echo '<script> alert("Email của bạn đã tồn tại"); 
            history.back();
            </script>';
		} else {
			//lenh them du lieu sql
			$insert = "INSERT INTO accounts(userid, username, password, email) VALUES('','$username','$password','$email')";

			//thuc thi
			$result = mysqli_query($conn, $insert);
			if ($result) {
				echo '<script> alert("Bạn đã đăng ký tài khoản thành công"); 
                window.location = "login.php";
                </script>';
			} else {
				echo '<script> alert("Ơ? Có gì đó sai sai! Bạn hãy thử lại xem sao!");
                history.back();
                </script>';
			}
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="assets/img/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="register.php?submit&register" method="post">
					<span class="login100-form-title p-b-49">
						Register
					</span>

					<div class="wrap-input100 validate-input" data-validate="User name is required">
						<span class="label-input100">User name</span>
						<input class="input100" type="username" name="user-name" placeholder="Type your user name" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Email is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="user-email" placeholder="Type your email" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="user-pass" placeholder="Type your password" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Repeat password</span>
						<input class="input100" type="password" name="user-repeatpass" placeholder="Type your repeat password" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-left p-t-8 p-b-31">
						<!-- <a href="#">
							<--Back
						</a> -->
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Register
							</button>
						</div>
					</div>

					<div class="text-left p-t-8 p-b-31">
						<a href="javascript:history.back()">
							<--Back </a>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<!-- <div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>

						<a href="register.php" class="txt2">
							Sign Up
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>


	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/vendor/animsition/js/animsition.min.js"></script>
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/select2/select2.min.js"></script>
	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>