<?php 
    require('connection.php');
    require('login_reg.php');

    $username=$_SESSION['username'];
    $getData=mysqli_query($con,"SELECT * FROM `registered_users` WHERE `username`='$username'");
    
    $row=mysqli_fetch_assoc($getData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>USER MEMBERSHIP FUNCTIONALITY</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<section class="profile_pg">
		
		<nav>
            <a href="index.html"><img src='logo.jpg'></a>
            <div class="nav-links_2" id="navLinks">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#" onclick="popup('profile_popup')">PROFILE<i style="margin-left: 10px;" class="fa fa-angle-down" aria-hidden="true"></i></a>
                    	<div class="user_profile">
                    		<ul>
                    			<li><a href="#" onclick="popup('edit_popup')">EDIT PROFILE</a></li>
                    			<li><a href="logout.php">LOGOUT</a></li>
                    		</ul>
                    	</div>
                    </li>
                </ul>
            </div>  
        </nav>


        <!--------------------------------------------------Profile------------------------------------------------>

        <div class="popup-container" id="profile_popup">
            <div class="profile popup">
                <form method="POST" action="">
                    <h2>
                        <span>YOUR PROFILE</span>
                        <button type="reset" onclick="popup('profile_popup')">X</button>
                    </h2>
                    <input type="text" placeholder="First Name" name="firstname" value="<?php echo $row['firstname']; ?>" disabled>
                    <input type="text" placeholder="Last Name" name="lastname" value="<?php echo $row['lastname']; ?>" disabled>
                    <input type="text" placeholder="Username" name="username" value="<?php echo $row['username']; ?>" disabled>
                    <input type="email" placeholder="E-mail" name="email" value="<?php echo $row['email']; ?>" disabled>
                    <input type="password" placeholder="Password" name="password" value="<?php echo $row['password']; ?>" disabled>
                    
                </form>
            </div>
        </div>


        <!-------------------------------------------------Edit Profile--------------------------------------------->

        <div class="popup-container" id="edit_popup">
            <div class="edit popup">
                <form method="POST" action="edit_profile.php">
                    <h2>
                        <span>EDIT PROFILE<i class="fa fa-pencil" aria-hidden="true" style="margin-left: 15px; font-size: 20px;"></i></span>
                        <button type="reset" onclick="popup('edit_popup')">X</button>
                    </h2>
                    <input type="text" placeholder="First Name" name="firstname" value="<?php echo $row['firstname']; ?>" required>
                    <input type="text" placeholder="Last Name" name="lastname" value="<?php echo $row['lastname']; ?>" required>
                    <input type="text" placeholder="Username" name="username" value="<?php echo $row['username']; ?>" style="color: grey;" disabled>
                    <input type="email" placeholder="E-mail" name="email" value="<?php echo $row['email']; ?>" required>
                    <input type="password" placeholder="Password" name="password" value="<?php echo $row['password']; ?>" required>
                    <button type="edit" class="edit_btn" name="edit" style="font-weight: 550;
                                                                            font-size: 15px;
                                                                            color: white;
                                                                            background-color: #30475e;
                                                                            padding: 4px 10px;
                                                                            border: none;
                                                                            outline: none;
                                                                            margin-top: 5px;">EDIT</button>
                </form>
            </div>
        </div>


        <script type="text/javascript">
            function popup(popup_name)
            {
                get_popup=document.getElementById(popup_name);
                if(get_popup.style.display=="flex")
                {
                    get_popup.style.display="none";
                }
                else
                {
                    get_popup.style.display="flex";
                }
            }
        </script>


        <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
                echo "<h1 style= 'margin-left: 350px; margin-top: 200px; color:white;'>Hii- $_SESSION[username]</h1>";
            }
        ?>
    	
    </section>
</body>
</html>