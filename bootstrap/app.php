<?php

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new application instance
| which serves as the "glue" for all the components of theme, and is
| the IoC container for the system binding all of the various parts.
|
*/
$app = new Todo\Application(
  realpath(__DIR__ . '/../')
);

return $app;
