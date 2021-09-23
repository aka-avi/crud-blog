<?php  
	require('config/config.php');
	require('config/db.php');

	if (isset($_POST['delete'])) {
		//get data
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

		$query = "DELETE FROM posts	WHERE id = {$delete_id}";

		// die($query);
		if(mysqli_query($conn, $query)){
			header('location: ' . ROOT_URL .'');
		}else{
			echo "Error Found: " . mysqli_error($conn);

			// die($query);
		}
	}


	//get id
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	//make query
	$query = 'SELECT * FROM posts WHERE id = '.$id;

	//get the result
	$result = mysqli_query($conn, $query);

	//fetch data
	$posts = mysqli_fetch_assoc($result);

	//free result
	mysqli_free_result($result);	

	//close connection
	mysqli_close($conn);
	
?>

<?php include('includes/header.php') ?>
<?php include('includes/nav.php') ?>
	<div class="container">
		<h1><?php echo htmlspecialchars($posts['title']); ?></h1>
		<small>Created On : <?php echo $posts['created_at']; ?> by <?php echo htmlspecialchars($posts['author']); ?></small>
		<p><?php echo htmlspecialchars($posts['body']); ?></p>
		<hr>
		<a class="btn" href="<?php echo ROOT_URL ?>">Back</a>
		<a class="btn" href="<?php echo ROOT_URL ?>editpost.php?id=<?php echo htmlspecialchars($posts['id']); ?>">Edit Post</a>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
			<input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($posts['id']); ?>">
			<input type="submit" class="btn danger" name="delete" value="delete">
		</form>
	</div> 
<?php include('includes/footer.php') ?>