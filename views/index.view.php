
<div class="container">
	<h1 class="heading">The Blogger</h1>
	<div><a href="login.php" class="btn btn-info">Admin</a></div>
	<?php foreach ($posts as $post):?>
		<article class="article article">
			<h2><a href="single.php?id=<?php echo $post['id'];?>"><?php echo $post['title']; ?></a></h2>
			<div class="body">
				<?php echo $post['body']; ?>
			</div>
		</article>
	<?php endforeach; ?>
</div>
