<?php
	require_once('./include/header.php');
	require_once('./core/autoload.php');

	$post_id = mysql_real_escape_string($_GET["post_id"]);
	$post_id = (int) $post_id;
 
?>

<!-- Header and Nav -->
<div class="row">
	<div class="large-12 columns">
		<div class="panel">
			<h1>Banner</h1>
		</div>
	</div>
</div>

<!-- End Header and Nav -->
<div class="row">
	<!-- Main Feed -->
	<!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
	<div class="large-12 columns">
		<?php	
	 	$db = new PDO('mysql:host=127.0.0.1;dbname=forum', 'root', '');
		
	 	$manager_topic = new TopicsManager($db);
		$topic = $manager_topic->read($post_id);

		?>
		<div class="row">
			<div class="large-2 columns small-3"><img src="http://placehold.it/100x100&text=[img]" /></div>
			<div class="large-10 columns">
				<p><strong><?php echo $topic->name(); ?></strong></p>
				<p><?php echo $topic->description(); ?></p>
				<ul class="inline-list">
					<li><a href="">Reply</a></li>
					<li><a href="">Quote</a></li>
					<li><a href="">Share</a></li>
				</ul>
			
				<h6>x Comments</h6>

				<?php
				$manager_post = new PostsManager($db);
				$post_list = $manager_post->readAll($post_id);
				$numItems = count($post_list);
				$i = 0;

				foreach ($post_list as $post) 
				{
					?>
					<div class="row">
						<div class="large-2 columns small-3"><img src="http://placehold.it/50x50&text=[img]" /></div>
						<div class="large-10 columns"><p><?php echo $post->body(); ?></p>
							<ul class="inline-list">
								<li><a href="">Reply</a></li>
								<li><a href="">Quote</a></li>
								<li><a href="">Share</a></li>
							</ul>
						</div>
					</div>

					<?php
					if(++$i !== $numItems) 
					{
						?>
						<!-- End Feed Entry -->
						<hr />
						<?php
					}
				}
				?>	
			</div>
		</div>		

<?php
	require_once('./include/footer.php');
?>