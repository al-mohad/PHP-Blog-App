<?php require '../functions.php';


$data = array();

if ($_SERVER['REQUEST_METHOD']==='POST') {
	# code...
	$title = $_POST['title'];
	$body  = $_POST['body'];
	
	if (empty($title) || empty($body)) {
		# code...
		$data['status'] = "<div class='alert alert-warning'><strong style='color:red'>Please fill all inputs!</strong</div>";
	} else {
		query("INSERT INTO posts (title, body) VALUES (:title, :body)", array('title' => $title, 'body' => $body), $conn);
		$data['status'] = "<div class='alert alert-warning'><strong style='color:green'>Post Created Successfully!</strong</div>";
	}
}
view('../views/admin/create', $data);
