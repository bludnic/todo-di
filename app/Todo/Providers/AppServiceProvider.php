<?php

namespace Todo\Providers;

use Todo\Providers\ServiceProvider;
use function Todo\Helpers\view;
use function Todo\Helpers\config;

class AppServiceProvider extends ServiceProvider {
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    view()->share('textdomain', config('textdomain'));
    view()->define('asset', 'Todo\Helpers\asset');
    view()->define('url', 'Todo\Helpers\url');
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register() {
    //
  }
}
