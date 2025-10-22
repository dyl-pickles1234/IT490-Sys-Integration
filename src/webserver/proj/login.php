<?php include 'logged_out_header.html'; ?>
<html>
<h1>Login!</h1>

<body>
	<div id="textResponse"></div>
	<p>Email: <input type="email" id="email_input"></p>
	<p>Password <input type="password" id="password_input"></p>
	<button type="button" id="login_button">Log in!</button>
	<script>
		document.getElementById("login_button").addEventListener('click', GetLoginInfo);
	</script>
</body>

</html>