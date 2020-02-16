
<br>
<div class="container">
	<h3><STRONG>The Blogger | <small>Admin Login</small></STRONG></h3>
	<form class="form" method="POST" action="./login.php">
		<div class="form-group col-md-3">
			<label for="username">Username or Email: </label>
			<input type="text" name="username" class="form-control">
		</div>
		<div class="form-group col-md-3">
			<label for="username">Password: </label>
			<input type="password" name="password" class="form-control">
			<br>
			<a href="./" class="btn btn-secondary btn-md-3">Back</a>
			<button class="btn btn-primary" name="login_btn" value="Login">Login</button>
		</div>
		<?php if (isset($status)): ?>
			<?php echo $status; ?>
		<?php endif; ?>
		
	</form>
</div>
