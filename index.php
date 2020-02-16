<?php require 'blog.php';

$posts = get('posts', $conn);

view('index', array('posts'=> $posts));