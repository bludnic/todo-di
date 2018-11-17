<?php

namespace Todo\Helpers;

use Todo\Application;

/**
 * Get the available application instance.
 *
 * @param string $abstract
 * @param array $parameters
 * @return mixed|\Yumi\Application
 */
function app($abstract = null, array $parameters = []) {
  if (is_null($abstract)) {
    return Application::getContainer();
  }

  return Application::getContainer()->get($abstract, $parameters);
}

/**
 * Get Twig view intance from plugin container.
 *
 * @param $view string|null
 * @param $data array
 */
function view($view = null, $data = []) {
  if (is_null($view)) {
    return app('view');
  }

  return app('view')->render($view, $data);
}

function config($key = null) {
  if (isset($key)) {
    return app($key);
  }

  return null;
}

function asset($path = '') {
  $path = rtrim($path, '\/');
  $assetPath = app('paths')['uri'] . '/' . app('directories')['public'] . $path;

  return $assetPath;
}

function url($path = '') {
  $path = rtrim($path, '\/');
  $url = app('paths')['url'] . '/' . $path;

  return $url;
}

function redirect($path = '') {
  $url = url($path);

  header("Location: $url");
  exit;
}
