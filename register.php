	<?php include'Initialize.php'; ?>
	<!DOCTYPE html>
	<html>
	<head>
		<title> Login Php</title> 
		<style type="text/css">
	.center {
		margin-left: auto; 
		margin-right: auto;
		}
		</style>
		</head> 
		<body>
		
		
		<div align="center">
			<h3>Registration Form</h3>
				<?php
				
					if(isset($_SESSION['alert_message'])) {
						echo'<div align="center">'. $_SESSION['alert_message']. '</div>';
						unset($_SESSION['alert_message']);
						}
					?>
					<br />
					<form method="POST"action="auth.php">
						<table class="center"border="1">
							<tr>
								<td>Firstname:</td>
								<td><input type="text" name="firstname"></td>
								</tr>
								<tr>
								<td>Lastname:</td>
								<td><input type="text"name="lastname"></td>
								</tr>
								<tr>
								<td>Username:</td>
								<td><input type="text"name="username"></td>
								</tr>
								<tr>
								<td>Password:</td>
								<td><input type="password"name="password"></td>
								</tr>
								<tr>
								<td>Confirm Password:</td>
								<td><input type="password"name="confirm_password"></td>
								</tr>
								<tr>
								<td colspan="2"align="center">
								<button name="register"type="submit"> Register</ button>
							</td>
							</tr>
							</table>
							</form>
					</div> 
					</body> 
					</html>