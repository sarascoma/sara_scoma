<?php
// Variabili contenenti i dati di connessione al db.

$db_hostname = 'localhost';
$db_username = 'root';
$db_password = 'root';
$db_name = 'sarascoma03';

// Creo connessine al db
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_name);



/**
 * Check sulla connessione al db che mostra un messaggio di errore nel caso in cui qualcosa non sia andato a buon fine
 */
if ( $connection->connect_error ) {
	die( 'Connessione al database non riuscita' . $connection->connect_error );
}

// Query.
$query = 'SELECT id, title, date, content FROM posts';
$query_result = $connection->query($query);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Titolo del progetto</title>
	<meta name="description" content="Descrizione dei contenuti della pagina">
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style_responsive.css">
</head>
<body>

	<div class = wrapper>

		<?php
		if ( $query_result->num_rows > 0 ) {
			while ( $row = $query_result->fetch_assoc()) {
			?>


				<article class="post" id="<?php echo $row['id']; ?>">
					<h3><?php echo $row['title']; ?></h3>

					<time datetime="<?php echo $row['date']; ?>"><?php echo $row['date']; ?></div>

					<p><?php echo $row['content']; ?></p>
				</article>
			<?php
			}

		}
		?>
	</div>
	
</body>
</html>