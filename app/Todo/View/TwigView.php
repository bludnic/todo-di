<?php

namespace Todo\View;

use Twig_Environment;
use Twig_Loader_Filesystem;
use Twig_Function;

class TwigView implements View {
  /**
   * @var Twig_Environment
   */
  public $engine;

  /**
   * Create twig instance.
   *
   * @param $path string Path to twig templates
   * @param $cache string Cache path to twig templates
   * @return $twig Twig_Environment
   */
  public function __construct($path = '', $cache = false, $debug = false) {
    $loader = new Twig_Loader_Filesystem($path);

    $this->engine = new Twig_Environment($loader, [
      // 'cache' => $cache, // @TODO cache is not flushing
      'debug' => $debug
    ]);

    $this->registerFunctions();
    $this->registerGlobals();
  }

  /**
   * Share WP functions to Twig.
   *
   * @return void
   */
  private function registerFunctions() {
    $functions = [];

    foreach ($functions as $function) {
      $this->engine->addFunction(new Twig_Function($function, $function));
    }
  }

  /**
   * Share global variables to Twig.
   *
   * @return void
   */
  private function registerGlobals() {
  }

  public function render($template, $data = []) {
    return $this->engine->render($template, $data);
  }

  /**
   * Helper method for share variables to Twig.
   *
   * @return void
   */
  public function share($key, $value) {
    $this->engine->addGlobal($key, $value);
  }

  /**
   * Helper method for share functions to Twig.
   *
   * @return void
   */
  public function define($name, $fn) {
    $this->engine->addFunction(new Twig_Function($name, $fn));
  }
}
