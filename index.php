<?php  
	require('config/config.php');
	require('config/db.php');

	//make query
	$query = 'SELECT * FROM posts ORDER BY created_at DESC';

	//get the result
	$result = mysqli_query($conn, $query);

	//fetch data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	//free result
	mysqli_free_result($result);	

	//close connection
	mysqli_close($conn);
	
?>

<?php include('includes/header.php') ?>
<?php include('includes/nav.php') ?>
	<div class="container">
		<h1 class="heading">Posts</h1>
		<?php foreach($posts as $post) : ?>
			<div class="article">
				<h3><?php echo htmlspecialchars($post['title']); ?></h3>
				<small>Created On : <?php echo $post['created_at']; ?> by <?php echo htmlspecialchars($post['author']); ?></small>
				<p><?php echo htmlspecialchars($post['body']); ?></p>
				<a class="btn" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo htmlspecialchars($post['id']) ?>">Read More</a>
			</div>
		<?php endforeach; ?>
	</div>
<?php include('includes/footer.php') ?>