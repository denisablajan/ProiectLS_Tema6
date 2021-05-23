<!DOCTYPE html>
<?php
   session_id("mainID");
   session_start();
?>

<html>
   <head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="login.css" rel="stylesheet">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>    
   </head>
	
   <body>
   <div class="background">
         <?php
			$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
			mysqli_select_db($conn, "users");
			$sql_read = "SELECT * FROM user";
			$result = mysqli_query($conn, $sql_read);
			if(! $result )
			{
			  die('Could not read data: ' . mysqli_error());
			}
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				while($row = mysqli_fetch_array($result)) {
					$username = $row['username'];
					$password = $row['password'];
					$type = $row['type'];
				
				   if ($_POST['username'] == $username && 
					  $_POST['password'] == $password && 
					  $type == 'user' &&
					  $username == $password && 
					  $password == $type) {
					  $_SESSION['valid'] = true;
					  $_SESSION['timeout'] = time();
					  $_SESSION['username'] = $username;
					  header('Location: tabela.php');
				   }elseif($_POST['username'] == $username && 
					  $_POST['password'] == $password && 
					  $type == 'admin' &&
					  ($username == $password && $password == $type)){
						$_SESSION['valid'] = true;
						$_SESSION['timeout'] = time();
						$_SESSION['username'] = $username;
						header('Location: tabela_admin.php');
					} 
				}
            }
			
         ?>
      
    
	
	<main class="form-signin">
	<form method="post">
		<h1 class="h3 mb-3 fw-normal">Please sign in</h1>

		<div class="form-floating">
		<input type="username" class="form-control" name="username" placeholder="Username">
		<label for="username">Username</label>
		</div>
		<div class="form-floating">
		<input type="password" class="form-control" name="password" placeholder="Password" required>
		<label for="password">Password</label>
		</div>

		<button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign in</button>
	</form>
	</main>
      </div>
   </body>
</html>