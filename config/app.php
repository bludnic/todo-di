<?php

return [
  /*
  |--------------------------------------------------------------------------
  | App Name
  |--------------------------------------------------------------------------
  |
  | This value is the name of your application. This value is used when the
  | framework needs to place the application's name in a notification or
  | any other location as required by the application or its packages.
  |
  */
  'name' => 'Todo',

  /*
  |--------------------------------------------------------------------------
  | App Version
  |--------------------------------------------------------------------------
  */
  'version' => '0.0.1dev',

  /*
  |--------------------------------------------------------------------------
  | App Textdomain
  |--------------------------------------------------------------------------
  */
  'textdomain' => 'todo',

  /*
  |--------------------------------------------------------------------------
  | Theme Root Paths
  |--------------------------------------------------------------------------
  */
  'paths' => [
    'directory' => realpath(__DIR__ . '/../'),
    'uri' => getenv('APP_URL'),
    'url' => getenv('APP_URL'),
    'tmp' => '/tmp'
  ],

  /*
  |--------------------------------------------------------------------------
  | App Directory Structure Paths
  |--------------------------------------------------------------------------
  |
  | This array of directories will be used within core for locating
  | and loading theme files, assets and templates. They must be
  | given as relative to the `root` theme directory.
  |
  */
  'directories' => [
    'languages' => 'resources/languages',
    'templates' => 'resources/templates',
    'wptemplates' => 'templates',
    'assets' => 'resources/assets',
    'public' => 'assets',
    'app' => 'app',
    'uploads' => 'public/uploads'
  ],

  /*
  |--------------------------------------------------------------------------
  | Autoloaded Service Providers
  |--------------------------------------------------------------------------
  |
  | The service providers listed here will be automatically loaded on the
  | request to your application. Feel free to add your own services to
  | this array to grant expanded functionality to your applications.
  |
  */
  'providers' => [
    Todo\Providers\ViewServiceProvider::class,

    Todo\Providers\AppServiceProvider::class
  ],

  'database' => function ($container) {
    $capsule = new Illuminate\Database\Capsule\Manager();

    $capsule->addConnection([
      'driver' => getenv('DB_CONNECTION'),
      'host' => getenv('DB_HOST'),
      'database' => getenv('DB_DATABASE'),
      'username' => getenv('DB_USERNAME'),
      'password' => getenv('DB_PASSWORD'),
      'port' => getenv('DB_PORT')
    ]);

    // Make this Capsule instance available globally.
    $capsule->setAsGlobal();

    // Setup the Eloquent ORM.
    $capsule->bootEloquent();
    $capsule->bootEloquent();

    return $capsule;
  },

  Symfony\Component\HttpFoundation\Request::class => function ($container) {
    $request = Symfony\Component\HttpFoundation\Request::createFromGlobals();

    return $request;
  }
];
