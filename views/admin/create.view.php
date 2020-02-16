<style type="text/css">
	form li{
		list-style: none;
	}
	form ul{
		padding: 0;
	}
	form input[type='text'], form textarea{
		margin-bottom: 1.5em;
		width: 100%;
	}
	form textarea{
		height: 200px;
	}
	.container{
		width: 600px;
		margin: auto;
	}
	label{
		display: block;
	}
</style>
<br>
<h1>Create a New Post</h1>
<div class="container">
	<form method="POST" action="">
	<ul>
		<li>
			<label>Post Title: </label>
			<input type="text" name="title" id="title">
		</li>
		<li>
			<label>Post Body: </label>
			<textarea name="body" id="body"></textarea>
		</li>
		<li>
			<input type="submit" name="create_post_btn" value="Create Post">
		</li>
	</ul>
</form>
<?php if (isset($status)):?>
	<?php echo $status; ?>
<?php endif; ?>
</div>