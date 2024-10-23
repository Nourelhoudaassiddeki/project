
<?php include('serv.php') ?>
<?php include('connectlogin.php')?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - A Pen by Mohithpoojary</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php


// Debugging


$stmt = $conn->prepare("SELECT PRIVILEGE FROM nouna WHERE PSEUDO = ?");
$stmt->bind_param("s", $pseudo); // $pseudo is the logged-in user's pseudo
$stmt->execute();
$stmt->bind_result($privileges);
$stmt->fetch();
$stmt->close();

// Store privileges in session
$_SESSION['user_privileges'] = explode(",", $privileges);?>
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" name="form" action="login.php" onsubmit="return isvalid()" method="POST">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" name="email"placeholder="Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input"name="password" placeholder="Password">
				</div>
				<input type="submit" id="btn" value="Login" name = "submit"/>	
						<div class="links">
						Don't have account? <a href="register.php">Sign in</a>
						</div>
			</form>
			<div class="social-login">
				<h3>log in via</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<script>
	function isvalid(){
		var user = document.form.user.value;
		var pass = document.form.pass.value;
		if(user.length=="" && pass.length==""){
			alert(" Username and password field is empty!!!");
			return false;
		}
		else if(user.length==""){
			alert(" Username field is empty!!!");
			return false;
		}
		else if(pass.length==""){
			alert(" Password field is empty!!!");
			return false;
		}

	}
</script>
<!-- partial -->
  <style>@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #B0C4DE, #F5F5DC); /* Blue and beige */
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
  position: relative;
  width: 450px; /* Adjusted width */
  height: 600px; /* Adjusted height */
  background: #ffffff;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.screen {
  position: absolute;
  width: 100%;
  height: 100%;
  padding: 40px;
  display: block;
  opacity: 1;
  transform: translateX(0);
  transition: all 0.5s ease-in-out;
}

.screen--login {
  background: #fff;
}

.screen__content {
  z-index: 2;
  position: relative;
  padding:40px;
}

h2 {
  color: #3a3a3a;
  margin-bottom: 20px;
  font-size: 24px;
  text-align: center;
}

.login__field {
  position: relative;
  margin-bottom: 20px;
}

.login__icon {
  position: absolute;
  top: 50%;
  left: 10px;
  transform: translateY(-50%);
  color: #7a7a7a;
}

.login__input {
  width: 100%; /* Ensure full width */
  padding: 12px;
  padding-left: 40px; /* Padding for icon */
  background: #f1f1f1;
  border: 1px solid #ccc; /* Border to make it distinct */
  border-radius: 10px;
  outline: none;
  transition: background 0.3s ease;
  font-size: 16px;
}

.login__input:focus {
  background: #e8e8e8;
  border-color: #5a8fbe; /* Border turns blue when focused */
}

input[type="submit"] {
  width: 100%; /* Full width */
  padding: 12px;
  background: #5a8fbe;
  color: white;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: background 0.3s ease;
  font-size: 16px;
}

input[type="submit"]:hover {
  background: #4778a6;
}

.links {
  margin-top: 10px;
  text-align: center;
}

.links a {
  color: #5a8fbe;
  text-decoration: none;
  font-size: 14px;
}

.background-image {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 150px;
  opacity: 0.1;
}

.screen__background {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: #DDE7EC;
  z-index: 1;
}

.screen__background img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(0.5);
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #B0C4DE, #F5F5DC); /* Blue and beige */
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
  position: relative;
  width: 450px; /* Adjusted width */
  height: 600px; /* Adjusted height */
  background: #ffffff;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.screen {
  position: absolute;
  width: 100%;
  height: 100%;
  padding: 40px;
  display: block;
  opacity: 1;
  transform: translateX(0);
  transition: all 0.5s ease-in-out;
}

.screen--login {
  background: #fff;
}

.screen__content {
  z-index: 2;
  position: relative;
  padding: 40px;
  border: 1px solid #d1d1d1; /* Border around the form */
  border-radius: 10px; /* Rounded corners for the form */
  background: #f9f9f9; /* Light background for the form */
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

h2 {
  color: #3a3a3a;
  margin-bottom: 20px;
  font-size: 24px;
  text-align: center;
}

.login__field {
  position: relative;
  margin-bottom: 20px;
}

.login__icon {
  position: absolute;
  top: 50%;
  left: 10px;
  transform: translateY(-50%);
  color: #7a7a7a;
}

.login__input {
  width: 100%; /* Ensure full width */
  padding: 12px;
  padding-left: 40px; /* Padding for icon */
  background: #f1f1f1;
  border: 1px solid #ccc; /* Border to make it distinct */
  border-radius: 10px;
  outline: none;
  transition: background 0.3s ease;
  font-size: 16px;
}

.login__input:focus {
  background: #e8e8e8;
  border-color: #5a8fbe; /* Border turns blue when focused */
}

input[type="submit"] {
  width: 100%; /* Full width */
  padding: 12px;
  background: #5a8fbe;
  color: white;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: background 0.3s ease;
  font-size: 16px;
}

input[type="submit"]:hover {
  background: #4778a6;
}

.links {
  margin-top: 10px;
  text-align: center;
}

.links a {
  color: #5a8fbe;
  text-decoration: none;
  font-size: 14px;
}

.background-image {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 150px;
  opacity: 0.1;
}

.screen__background {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: #DDE7EC;
  z-index: 1;
}

.screen__background img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(0.5);
}
