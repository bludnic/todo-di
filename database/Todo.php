<?php

if (file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
  require $composer;
}

$app = require_once __DIR__ . '/../bootstrap/app.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('todos', function ($table) {
  $table->increments('id');
  $table->string('author', 20);
  $table->string('email');
  $table->string('text');
  $table->string('image');
  $table->enum('status', ['pending', 'done'])->default('pending');
  $table->timestamps();
});
