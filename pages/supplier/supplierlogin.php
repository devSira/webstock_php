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
	<h1>Supplier Login</h1>
	<form action="../../authentication/authensplr.php" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" value="supplier1">
		<br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" value="password1">
		<br><br>
		<input type="submit" id="supplier" value="Login">
	</form>
</body>
</html>
