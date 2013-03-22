<?php
	require_once('./include/header.php');
	require_once('./core/autoload.php');
?>

<!-- Header and Nav -->
<div class="row">
	<div class="large-12 columns">
		<div class="panel">
			<img src="http://placehold.it/1600x300&text=Header">
		</div>
	</div>
</div>

<!-- End Header and Nav -->
<div class="row">
	<!-- Main Feed -->
	<!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
	<div class="large-12 columns">
	 	<?php	
		 	$db = new DbConfig();
			$manager = new TopicsManager($db);
			$topic_list = $manager->readAll();
			$numItems = count($topic_list);
			$i = 0;

			foreach ($topic_list as $topic) 
			{
				?>
				<div class="row">
					<div class="large-2 columns small-3"><a href="posts_list.php?post_id=<?php echo $topic->id(); ?>" alt="" title=""><img src="http://placehold.it/100x100&text=[img]" /></div>
					<div class="large-10 columns">
						<p><strong><a href="posts_list.php?post_id=<?php echo $topic->id(); ?>" alt="" title=""><?php echo $topic->name(); ?></a></strong></p>
						<p><?php echo $topic->description(); ?></p>
						<ul class="inline-list">
						<li><a href="">Reply</a></li>
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
<!-- End Feed Entry -->
</div> 
 
<!-- Footer -->
<footer class="row">
	<div class="large-12 columns">
		<hr />
		<div class="row">
			<div class="large-5 columns">
				<p>&copy; Copyright Harrick Zeke.</p>
			</div>
		
			<div class="large-7 columns">
				<ul class="inline-list right">
					<li><a href="#">Section 1</a></li>
					<li><a href="#">Section 2</a></li>
					<li><a href="#">Section 3</a></li>
					<li><a href="#">Section 4</a></li>
					<li><a href="#">Section 5</a></li>
					<li><a href="#">Section 6</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<?php
	require_once('./include/footer.php');
?>