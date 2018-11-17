<?php

if (file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
  require $composer;
}

$app = require_once __DIR__ . '/../bootstrap/app.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('users', function ($table) {
  $table->increments('id');
  $table->string('name');
  $table->string('email')->unique();
  $table->string('password');
  $table->enum('role', ['admin', 'user'])->default('user');
  $table->rememberToken();
  $table->timestamps();
});
