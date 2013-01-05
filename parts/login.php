		<div id="login">
			<?php
			if(isset($_SESSION['user']['username']) && $_SESSION['user']['username'] != null)
			{
				include_once('classes/class.user.php');
				$user = (new User())->get_user($_SESSION['user']['username']);
				$name = $user->fname.' '.$user->lname;
			?>
				<p id="username">
					<span class="white">Welcome, <?php print $name;?>!</span>
					<a id="login" class="ui-button" href="logout.php">Log Out</a>
				</p>
				
			<?php }
			else
			{
			?>
			<form method="post" action="login.php">
				<span class="white">ID:</span><input type="text" name="user_id" id="TEXTBOX_ID" />
				<span class="white">Password:</span><input type="password" name="user_pw" id="TEXTBOX_PASSWORD" />
				<input type="submit" name="login" value="Log-In" />
			</form>
			<?php } ?>
		</div>