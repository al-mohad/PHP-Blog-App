<?php require 'blog.php';

//$post = query('SELECT * FROM posts WHERE id=:id LIMIT 1', array('id' => $_GET['id']), $conn);
$post = get_by_id((int)$_GET['id'], $conn);
if ($post) {
	$post = $post[0];
} else {
	header('location:./index.php');
}

view('single',  array('post' => $post));