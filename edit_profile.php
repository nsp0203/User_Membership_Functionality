<?php
	require("connection.php");
	if(isset($_POST['edit']))
	{
		$pass=password_hash($_POST['password'],PASSWORD_BCRYPT);
		$update="UPDATE `registered_users` SET `firstname`='$_POST[firstname]',`lastname`='$_POST[lastname]',`email`='$_POST[email]',`password`='$pass' WHERE `username`='$_POST[username]' OR `email`='$_POST[email]' ";
		if(mysqli_query($con,$update))
		{
			echo "
				<script>
					alert('Profile Updated Successfully...!!');
					window.location.href='profile_pg.php';
				</script>
				";
		}
		else
		{
			echo "
				<script>
					alert('You can't update the username ...!!');
					window.location.href='profile_pg.php';
				</script>
				";
		}
	}
?>