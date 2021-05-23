<!DOCTYPE html>
<html>
	<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="tabela.css" rel="stylesheet">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Tabela user</title>    
   </head>
	<body>
        <div class="background">
    <?php
			$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
			mysqli_select_db($conn, "users");
			$sql_read = "SELECT * FROM locatii";
			$result = mysqli_query($conn, $sql_read);
			if(! $result )
			{
			  die('Could not read data: ' . mysqli_error());
			}
        ?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <form class="d-flex">
        </form>
        </div>
    </div>
    </nav>

<main class="container">
  <div class="bg-light p-5 rounded">
    <h1>Tabela pentru user</h1>
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