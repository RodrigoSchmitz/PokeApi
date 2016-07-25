<!DOCTYPE html>
<html>
<head>
	<title>Teste PokeApi</title>
</head>
<body>
<form method="GET" action="#">
	<label>id do pokemon</label>
	<input type="text" name="idPokemon">
	<button type="submit" name="submit">Enviar</button>
</form>

<?php
	require "../src/PokeApi.php";
	$pokemon = new PokeApi();

	if (isset($_GET['submit'])) {
		echo "string";
		echo $pokemon->getPokemonById('1');
	}
?>
</body>
</html>