<?php

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Application();
$app['debug'] = true;

$app->mount('/pokemon', require 'src/Controllers/PokemonController.php');

$app->run();