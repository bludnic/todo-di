<?php

use FastRoute\RouteCollector;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use function Todo\Helpers\app;

$routes = require_once __DIR__ . '/../../routes/web.php';

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) use ($routes) {
  foreach ($routes as $route) {
    $r->addRoute($route['method'], $route['path'], $route['controller']);
  }
});

$route = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

switch ($route[0]) {
  case FastRoute\Dispatcher::NOT_FOUND:
  echo '404 Not Found';
  break;

  case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
  echo '405 Method Not Allowed';
  break;

  case FastRoute\Dispatcher::FOUND:
  try {
    $controller = $route[1];
    $parameters = $route[2];

    $content = '';
    $abstract = app()->call($controller, $parameters);

    // JSON Response
    if ($abstract instanceof JsonResponse) {
      header('Content-Type: application/json');
      $content = $abstract->getContent();
    } elseif ($abstract instanceof Response) {
      $content = $abstract->getContent();
    } elseif (!empty($abstract)) {
      $content = $abstract;
    }

    echo $content;
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  break;
}
