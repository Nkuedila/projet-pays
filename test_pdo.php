<?php
try {
	$dbh = new PDO('mysql:host=localhost;dbname=pays', 'admin', 'Afpa1234');
	
} catch (PDOException $e) {
    // attempt to retry the connection after some timeout for example
	print "Erreur";
}


$sth = $dbh->query("SELECT * FROM `t_pays` ORDER BY libelle_pays;");


?>
<!DOCTYPE html> 
<html lang="fr"> 
    <head>
        <meta charset="utf-8">
        <title>Les pays</title>
		 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css"/>
	</head>
    <body> 
		<table id="example" class="display" style="width:100%">
		  <thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Nom du pays</th>
			  <th scope="col">Population</th>
			  <th scope="col">Taux de natalité</th>
			</tr>
		  </thead>
		  <tbody>
			<?php foreach($sth->fetchAll() as $row) { ?>
			<tr>
			  <th scope="row"><?php print $row["id_pays"];?></th>
			  <td><?php print $row["libelle_pays"];?></td>
			  <td><?php print $row["population_pays"];?></td>
			  <td><?php print $row["taux_natalite_pays"];?></td>
			</tr>
			<?php } ?>
		  </tbody>
		</table>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<script type="text/javascript">
			new DataTable('#example');
		</script>
	</body>
</html>
<?php 
$sth=null;
$dbh=null;
?>

