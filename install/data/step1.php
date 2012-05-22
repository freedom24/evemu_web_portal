<table id="installer-main">
	<tr>
		<td style="width: 185.717px; vertical-align: top;">
			<ul>
				<li>Database setup</li>
			</ul>
		</td>
		<td>
			<p><h3>Database setup</h3></p>			
			<p>
			<?php
				if( (isset($_GET['action']) == false) || (empty($_GET['action']) == true) )
				{
			?>
				<table border=0>
					<form method="POST" action="?step=1&action=check-database">
						<tr><td><strong>Database host:</strong></td><td><input type="text" name="server" value=""></td></tr>
						<tr><td colspan=2><div id="entry-description"><i>Address to the Database host(empty for localhost)</i></div></td></tr>
						<tr><td><strong>Database username:</strong></td><td><input type="text" name="user" value="root"></td></tr>
						<tr><td colspan=2><div id="entry-description"><i>A privileged user in the database host</i></div></td></tr>
						<tr><td><strong>Database password:</strong></td><td><input type="password" name="pass" value=""></td></tr>
						<tr><td colspan=2><div id="entry-description"><i>The password for the Database user</i></div></td></tr>
						<tr><td><strong>Database name:</strong></td><td><input type="text" name="database" value="evemu"></td></tr>
						<tr><td colspan=2><div id="entry-description"><i>The database in which store the data. Be sure it points to the game server database</i></div></td></tr>
						<tr><td colspan=2><input type="submit" value="Next Step"></td></tr>
					</form>
				</table>
			<?php
				}
				else
				{
					// Set default data
					$DB_Server = "localhost";
					$DB_User = "root";
					$DB_Password = "root";
					$DB_Database = "evemu";
					
					// Get the data from the form
					if( @(empty($_POST['server']) == false) )
					{
						$DB_Server = $_POST['server'];
					}
					
					if( @(empty($_POST['user']) == false) )
					{
						$DB_User = $_POST['user'];
					}
					
					if( @(empty($_POST['pass']) == false) )
					{
						$DB_Password = $_POST['pass'];
					}
					
					if( @(empty($_POST['database']) == false) )
					{
						$DB_Database = $_POST['database'];
					}
					
					if(Database::Connect() == false)
					{
						?>
							<h4>MySql error</h4>
							<div id="error">Cannot connect to the database. MySql error: <?php echo mysql_error(); ?></div>
							<form method="POST" action="?step=1">
								<input type="submit" value="Go back">
							</form>
						<?php
					}
					else
					{
					?>
						<div id="sucess">Connection stablished correctly</div>
						<form method="POST" action="?step=2">
							<input type="hidden" name="server" value="<?php echo $DB_Server; ?>">
							<input type="hidden" name="user" value="<?php echo $DB_User; ?>">
							<input type="hidden" name="pass" value="<?php echo $DB_Password; ?>">
							<input type="hidden" name="database" value="<?php echo $DB_Database; ?>">
							<input type="submit" value="Next step">
						</form>
					<?php
					}
			?>
			
			<?php
				}
			?>
			</p>
		</td>
	</tr>
</table>