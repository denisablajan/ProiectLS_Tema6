<!DOCTYPE html>
<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="tabela.css" rel="stylesheet">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
      <title>Tabela admin</title>    
   </head>
	<body>
	<div class="background">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbarCollapse">
			<form class="d-flex">
			</form>
			</div>
		</div>
    </nav>
	<main class="container admin">
  	<div class="bg-light p-5 rounded">

	  <h1>Tabela pentru admin</h1>
	  <br>
			 <form  method = "post">
				
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput" name="nume">
					<label for="floatingInput">nume</label>
				</div>
				
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput" name="latitudine">
					<label for="floatingInput">latitudine</label>
				</div>

				

				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput" name="longitudine">
					<label for="floatingInput">longitudine</label>
				</div>

				

				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput" name="culoare">
					<label for="floatingInput">culoare</label>
				</div>

				

				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput" name="dimensiune">
					<label for="floatingInput">dimensiune</label>
				</div>

				<button class="btn btn-lg btn-primary" type="submit" name="submit">Submit</button>
			 </form>
			
			<?php
			$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
			mysqli_select_db($conn, "users");
			if (isset($_POST['submit']) && !empty($_POST['nume']) && !empty($_POST['latitudine']) && 
			!empty($_POST['longitudine']) && !empty($_POST['culoare']) && !empty($_POST['dimensiune'])){
					$nume = $_POST['nume'];
					$latitudine = $_POST['latitudine'];
					$longitudine = $_POST['longitudine'];
					$culoare = $_POST['culoare'];
					$dimensiune = $_POST['dimensiune'];
					
					$sql_insert="INSERT INTO locatii (nume, latitudine, longitudine, culoare, dimensiune) VALUES ('$nume', '$latitudine', '$longitudine', '$culoare', '$dimensiune')";

					$retval = mysqli_query($conn, $sql_insert);
					
					if(! $retval )
					{
					  die('Could not insert data: ' . mysqli_error($conn));
					}else{
						header('Location: ' . $_SERVER['PHP_SELF']);
    					exit(0);
					}
			}

			$sql_read = "SELECT * FROM locatii";
			$result = mysqli_query($conn, $sql_read);
			if(! $result )
			{
			  die('Could not read data: ' . mysqli_error());
			}
        ?>
	
	</div>
	</main>

	<main class="container">
  	<div class="bg-light p-5 rounded">
    <br>
    		 
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Nume</td>
            <th scope="col">Latitudine</td>
            <th scope="col">Longitudine</td>
            <th scope="col">Culoare</td>
            <th scope="col">Dimensiune</td>
            </tr>
        </thead>
            <tbody>
        <?php
               while($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
                   echo "<td>".$row['nume']."</td>";
                   echo "<td>".$row['latitudine']."</td>";
                   echo "<td>".$row['longitudine']."</td>";
                   echo "<td>".$row['culoare']."</td>";
                   echo "<td>".$row['dimensiune']."</td>";
                   echo "</tr>";
               }

            ?>
        </tbody>
    </table>
    
    <a class="btn btn-lg btn-primary" href="map.php" role="button" type="submit" value="MAP">Harta</a>
	</div>
	</main>

	</div>
	</body>
</html>