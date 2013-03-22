<?php
	require_once('./include/header.php');
	require_once('./core/autoload.php');
?>
	<div class="large-9 columns">
		<div class="row">
			<?php
				$topic = new Topic(array('id' => 1, 'name' => "Saucisse", 'description' => "Le topic préféré des saucisses", 'authorId' => 1, 'orderId' => 1));
				echo $topic->name() . ' - ' . $topic->description() . '<br />';

				$topic = new Topic(array('id' => 2, 'name' => "Plop", 'description' => "Vive les plops", 'authorId' => 1, 'orderId' => 2));
				echo $topic->name() . ' - ' . $topic->description() . '<br />';

				$post = new Post(array('id' => 1, 'body' => "Bla bla bla lololol", 'datetime' => date("Y-m-d H:i:s", time()), 'authorId' => 1, 'orderId' => 2));
				echo $post->datetime()  . ' - ' . $post->body() . '<br />';

				/**
				 * MANAGER TEST
				 */
				//$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
				$db = new DbConfig();
				$topic = new Topic(array('id' => 1, 'name' => "Saucisse", 'description' => "Le topic préféré des saucisses", 'authorId' => 21, 'orderId' => 45));
				$manager = new TopicsManager($db);
				//$manager->create($topic);

				echo 'Read one records : <br />';
				$saucisse = $manager->read(1);
				echo '<pre>';
				print_r($saucisse);           
				echo '</pre>';

				echo 'Read all records : <br />';
				$knack = $manager->readAll();
				echo '<pre>';
				//print_r($knack);           
				echo '</pre>';

				
			?>
		</div>
	</div>

<?php
	require_once('./include/footer.php');
?>