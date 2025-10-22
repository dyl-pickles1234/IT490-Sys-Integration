<?php include 'logged_out_header.html'; ?>
<html>
<h1>Register</h1>

<body>
	<div id="textResponse"></div>
	<p>First name: <input type="text" id="fname_input"></p>
	<p>Last name: <input type="text" id="lname_input"></p>
	<p>Email: <input type="email" id="email_input"></p>
	<p>Password <input type="password" id="password_input"></p>
	<button type="button" id="register_button">Register!</button>
	<script>
		document.getElementById("register_button").addEventListener('click', GetRegistrationInfo);
	</script>
</body>

</html>