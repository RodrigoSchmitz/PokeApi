<?php

require 'env.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

$pokemon = $app['controllers_factory'];

$pokemon->get('/{id}', function($id, Application $app){
	if(is_null($id))
		return new Response('Não foi passado nenhum parametro de busca', 403);
	return new Response(getPokemonById($id));
})->value('id', null);


function getPokemonById($id){
	$url = getenv('BASE_URL') . 'pokemon/' . $id;
	return SendRequest($url);
}

function SendRequest($url){
	$ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($http_code != 200) {
        return json_encode('An error has occured.');
    }
    return $data;
}

return $pokemon;