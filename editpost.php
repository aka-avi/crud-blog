<?php  
	require('config/config.php');
	require('config/db.php');

	if (isset($_POST['submit'])) {
		//get data
		$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$author = mysqli_real_escape_string($conn, $_POST['author']);
		$body = mysqli_real_escape_string($conn, $_POST['body']);

		$query = "UPDATE posts SET 
					title = '$title',
					author = '$author',
					body = '$body'
					WHERE id = {$update_id}";

		// die($query);
		if(mysqli_query($conn, $query)){
			header('location: ' . ROOT_URL .'');
		}else{
			echo "Error Found: " . mysqli_error($conn);
		}
	}

	//get id
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	//make query
	$query = 'SELECT * FROM posts WHERE id = '.$id;

	//get the result
	$result = mysqli_query($conn, $query);

	//fetch data
	$post = mysqli_fetch_assoc($result);

	//free result
	mysqli_free_result($result);	

	//close connection
	mysqli_close($conn);
	
?>

<?php include('includes/header.php') ?>
<?php include('includes/nav.php') ?>
	<div class="container addpost">
		<h1>Edit Post</h1>
		<form method="POST" class="formgroup" action="<?php $_SERVER['PHP_SELF']; ?>">
			<input type="text" class="title" name="title" placeholder="Title" value="<?php echo htmlspecialchars($post['title']) ?>">
			<input type="text" name="author" placeholder="author" value="<?php echo htmlspecialchars($post['author']) ?>">
			<textarea name="body" placeholder="post"><?php echo htmlspecialchars($post['body']) ?></textarea>
			<input type="hidden" name="update_id" value="<?php echo htmlspecialchars($post['id']); ?>">
			<input type="submit" name="submit" class="btn postbtn" value="Update Post">
		</form>
	</div>
<?php include('includes/footer.php') ?>