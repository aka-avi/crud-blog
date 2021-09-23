<?php  
	require('config/config.php');
	require('config/db.php');

	if (isset($_POST['submit'])) {
		//get data
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$author = mysqli_real_escape_string($conn, $_POST['author']);
		$body = mysqli_real_escape_string($conn, $_POST['body']);

		$query = "INSERT INTO posts(title, author, body) VALUES('$title', '$author' , '$body')";

		if(mysqli_query($conn, $query)){
			header('location: ' . ROOT_URL .'');
		}else{
			echo "Error " . mysqli_error($conn);
		}
	}
?>

<?php include('includes/header.php') ?>
<?php include('includes/nav.php') ?>
	<div class="container addpost">
		<h1>Add Post</h1>
		<form method="POST" class="formgroup" action="<?php $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="title" class="title" placeholder="Enter Blog Title">
			<input type="text" name="author" placeholder="Author Name">
			<textarea name="body" placeholder="Start Writing your article"></textarea>
			<input class="btn postbtn" type="submit" name="submit" value="Post">
		</form>
	</div>
<?php include('includes/footer.php') ?>