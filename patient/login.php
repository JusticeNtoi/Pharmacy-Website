<!DOCTYPE>
<html>
	<head>
		<title></title>
		<meta @charset = "UTF-8"/>
		<link rel="stylesheet" type="text/css" href="ica.css">
	</head>
	<body>
		<section>
			<h1>Patient</h1>
			<form action="plogin.php" method="post">
				<fieldset>
					<legend>FILL IN TO LOGIN</legend>
					<table>
						<tr>
							<td>UserName:</td>
							<td> <input type="email" name="email" placeholder="User Name" required> </td>
						</tr>
						<tr>
							<td>Password:</td>
							<td> <input type="password" name="password" placeholder="Password" required> </td>
						</tr>
						<tr>
							<td> <input type="submit" name="submit" value="LOGIN"> </td>
						</tr>
					</table>
				</fieldset>
			</form>
		</section>
	</body>
</html>