<?php

return [
  [
    'method' => 'GET',
    'path' => '/',
    'controller' => [Todo\Controllers\HomeController::class, 'index']
  ],
  [
    'method' => 'POST',
    'path' => '/todo',
    'controller' => [Todo\Controllers\HomeController::class, 'create']
  ],
  [
    'method' => 'GET',
    'path' => '/todo/delete/{id}',
    'controller' => [Todo\Controllers\HomeController::class, 'delete']
  ]
];
