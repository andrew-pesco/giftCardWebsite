<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BREEZ</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="twitter-bootstrap-320b75d/docs/assets/css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="twitter-bootstrap-320b75d/docs/assets/js/jquery.js"></script>
<script type="text/javascript" src="twitter-bootstrap-320b75d/docs/assets/js/bootstrap-dropdown.js"></script>

</head>
<body>
<br />
<div class="row">
<div class = "span4 offset1">
<div class="well">
	<form method="post" action="login.php">
		<input class="span3" type="text" name="email_address" placeholder="email address"/><br />
		<input class = "span2" type="password" name="password" placeholder="password"/>
		<input type="Submit" class= "btn btn-success" value="Sign in" style="height: 38px; width: 80 margin-top: 4000px" />
	</form>
</div>
</div>
</div>

<div class="row">
<div class = "span4 offset1">
<div class="well">
	<form method="post" action = "newuser.php">
		<label>New To BREEZ.  Sign Up.</label>
		<input class="span3" type="text" name="full_name" placeholder="full name"/>
			<select name="college">;
				<option value="">college</option>
				<?php
					include 'databasefunctions.php';
					$colleges = getColleges();
					while($college=mysql_fetch_array($colleges)){
						Print "<option value=\"".$college['collegeName']."\">".$college['collegeName']."</option>";
					}
				?>
			</select>
		<input class="span3" type="text" name="email_address" placeholder="email address"/><br />
		<input class = "span3" type="password" name="password" placeholder="password" />
		<input class = "span3" type="password" name="confirm_password" placeholder="confirm password" />
		<input type="Submit" class= "btn btn-success" value="Sign up" style="height: 38px; width: 80 margin-top: 4000px" />
	</form>
</div>
</div>
</div>

<div class = "row">
<div class = "span4 offset1">
<p>
</p>
</div>
</div>

</div>
</div>
</div>
</body>
</html>