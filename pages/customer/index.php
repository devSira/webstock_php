<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title> 
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/login.css">
	<?php
	include "../../components/navbar.html";
	?>
</head>
<body>
	<h1>Customer Login</h1>
	<form action="../../authentication/authencust.php" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" value="john">
		<br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" value="1234">
		<br><br>
		<input type="submit" value="Login">
	</form>
</body>
</html>
