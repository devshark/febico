<!DOCTYPE html>
<html lang="en">
<?php require_once('parts/header.php');?>
	<body>
	<div id="body">
		<?php require_once('parts/login.php'); ?>
		<?php require_once('parts/banner.php'); ?>
		<?php require_once('parts/menu.php'); ?>
		<div id="contents">
			<div style="clear:both;"></div>
			<?php 
			include_once('classes/class.event.php');
			$events = (new Event())->get_events();
			foreach($events as $event)
			{ ?>
			<article>
				<p class="title"><?php print $event->title;?></p>
				<p class="meta">
					Posted by <span class="author"><?php print $event->author;?></span>
					On <span class="date white"><?php print $event->date_created;?></span>
				</p>
				<div class="text"><?php print $event->contents;?></div>
			</article>
			<div style="height:2px;"> </div>
			<?php }
			?>
			
			<?php if(isset($_SESSION['user']['username']) && $_SESSION['user']['username'] != null){ ?>
			<form method="post" action="events.save.php">
				<label><span class="white">Title : </span></label><input type="text" name="title" maxlength="50" /><br/><br/>
				<textarea name="contents" class="tinymce"></textarea>
				<p align="right"><input type="submit" name="save" value="Post" /></p>
			</form>
			<?php } ?>
			<div style="height:1px;"> </div>
		</div>
		<?php require_once('parts/footer.php'); ?>
	</div>
	</body>
</html>