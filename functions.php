<?php session_start();

function connection(){
	try {
		$conn = new PDO('mysql:host=localhost;dbname=blog','root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	} catch (PDOException $e) {
		return false;
	}
}

$conn = connection();
function query($query, $bindings, $conn){
	$stmt = $conn->prepare($query);
	$stmt->execute($bindings);
	return $stmt;

// 	$results = $stmt->fetchAll();

// 	return $results ? $results : false;
}

function get($table_name, $conn, $limit = 10){
	try {
		$results = $conn->query("SELECT * FROM $table_name ORDER BY id DESC LIMIT $limit");
		return ($results->rowCount() > 0)
		? $results : false;
	} catch (Exception $e) {
		return false;
	}
}

function get_by_id($id,$conn){
	$query = query('SELECT * FROM posts WHERE id=:id LIMIT 1', array('id' => $id), $conn);
	return $query->fetchAll();
}

function view($path, $data = null){
	// if there is data extract it
	if ($data) {
		extract ($data);
	}

	$path = $path. '.view.php';
	include "views/layout.php";
}

if (isset($_POST['login_btn'])) {
	# code...
	$username  = $_POST['username'];
	$email	   = $_POST['username'];
	$password  = $_POST['password'];

	validate_user_creds($username, $email, $password, $conn);
}

function validate_user_creds($username, $email, $password, $conn){
		$stmt = $conn->prepare("SELECT * FROM users WHERE username=? || email=? AND password=?");

	      // execute
	      $stmt->execute(array($username,$email,$password));
	      // check match
	      $result = $stmt->rowCount();
	      // store rowcount
	      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
	      // 
	      $status = "";
	      if($result == 1) {

	        $_SESSION['username'] 	= $row['username'];
	        $_SESSION['user_type'] 	= $row['user_type'];
	        $_SESSION['id']  		= $row['id'];

	       	if ($_SESSION['user_type'] =='admin') {
	       		# code...
	       		header('location:admin/');
	       	} elseif ($_SESSION['user_type'] =='student') {
	       		# code...
	       		header('location:student/');
	       	} elseif ($_SESSION['user_type'] =='isupervisor') {
	       		# code...
	       		header('location:isupervisor/');
	       	} elseif ($_SESSION['user_type'] =='esupervisor') {
	       		# code...
	       		header('location:esupervisor/');
	       	}
	      } else {
	        $status = "<div class='alert alert-danger' role='alert'><strong>Invalid login credentials!!!</strong></div>";
			}

}